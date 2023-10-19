<?php

declare (strict_types = 1);

namespace App\Controllers;

use App\Services\TransactionService;
use Framework\TemplateEngine;

class HomeController
{
  public function __construct(
    private TemplateEngine $view,
    private TransactionService $transactionService
  ) {
  }

  public function home()
  {
    $page       = (int) ($_GET['p'] ?? 1);
    $length     = 3;
    $offset     = ($page - 1) * $length;
    $searchTerm = $_GET['s'] ?? null;

    if ($page <= 0) {
      header("Location: /?p=1");
      exit;
    }

    [$transactions, $count] = $this->transactionService->getUserTransactions(
      $length,
      $offset
    );

    $headerPath = $this->view->resolve("partials/_header.php");
    $footerPath = $this->view->resolve("partials/_footer.php");
    $csrf       = $this->view->resolve("partials/_csrf.php");
    $lastPage   = ceil($count / $length);

    if ($page > $lastPage) {
      header("Location: /?p=1");
      exit;
    }

    $pages = $lastPage ? range(1, $lastPage) : [];

    $pageLinks = array_map(
      fn($pageNum) => http_build_query([
        'p' => $pageNum,
        's' => $searchTerm,
      ]),
      $pages
    );

    echo $this->view->render("/index.php", [
      'headerPath'        => $headerPath,
      'footerPath'        => $footerPath,
      'csrf'              => $csrf,
      'transactions'      => $transactions,
      'currentPage'       => $page,
      'lastPage'          => $lastPage,
      'previousPageQuery' => http_build_query([
        'p' => $page - 1,
        's' => $searchTerm,
      ]),
      'nextPageQuery'     => http_build_query([
        'p' => $page + 1,
        's' => $searchTerm,
      ]),
      'pageLinks'         => $pageLinks,
      'searchTerm'        => $searchTerm,
    ]);
  }
}
