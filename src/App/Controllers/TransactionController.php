<?php

declare (strict_types = 1);

namespace App\Controllers;

use App\Services\TransactionService;
use App\Services\UserService;
use App\Services\ValidatorService;
use Framework\TemplateEngine;

class TransactionController extends LayoutController
{
  public function __construct(
    private TransactionService $transactionService,
    protected TemplateEngine $view,
    protected ValidatorService $validatorService,
    protected UserService $userService
  ) {
    parent::__construct($view, $validatorService, $userService);
  }

  public function createView()
  {
    $partials = $this->getPartials();
    echo $this->view->render("transactions/create.php", $partials);
  }
  public function create()
  {
    $this->validatorService->validateTransaction($_POST);

    $this->transactionService->create($_POST);

    redirectTo('/');
  }
  public function editView(array $params)
  {
    $partials    = $this->getPartials();
    $transaction = $this->transactionService->getUserTransaction(
      $params['transaction']
    );

    if (!$transaction) {
      redirectTo('/');
    }

    echo $this->view->render('transactions/edit.php', [
      ...$partials,
      'transaction' => $transaction,
    ]);
  }
  public function edit(array $params)
  {
    $transaction = $this->transactionService->getUserTransaction(
      $params['transaction']
    );

    if (!$transaction) {
      redirectTo('/');
    }

    $this->validatorService->validateTransaction($_POST);

    $this->transactionService->update($_POST, $transaction['id']);

    redirectTo('/');
  }
  public function delete(array $params)
  {
    $this->transactionService->delete((int) $params['transaction']);

    redirectTo('/');
  }
}
