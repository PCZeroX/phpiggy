<?php

declare (strict_types = 1);

namespace App\Controllers;

use App\Services\ReceiptService;
use App\Services\TransactionService;
use App\Services\UserService;
use App\Services\ValidatorService;
use Framework\TemplateEngine;

class ReceiptController extends LayoutController
{
  public function __construct(
    private TransactionService $transactionService,
    private ReceiptService $receiptService,
    protected TemplateEngine $view,
    protected ValidatorService $validatorService,
    protected UserService $userService
  ) {
    parent::__construct($view, $validatorService, $userService);
  }

  public function uploadView(array $params)
  {
    $partials    = $this->getPartials();
    $transaction = $this->transactionService->getUserTransaction($params['transaction']);

    if (!$transaction) {
      redirectTo("/");
    }

    echo $this->view->render("receipts/create.php", $partials);
  }
  public function upload(array $params)
  {
    $transaction = $this->transactionService->getUserTransaction($params['transaction']);

    if (!$transaction) {
      redirectTo("/");
    }

    $receiptFile = $_FILES['receipt'] ?? null;

    $this->receiptService->validateFile($receiptFile);

    $this->receiptService->upload($receiptFile, $transaction['id']);

    redirectTo("/");
  }
  public function download(array $params)
  {
    $transaction = $this->transactionService->getUserTransaction(
      $params['transaction']
    );

    if (empty($transaction)) {
      redirectTo('/');
    }

    $receipt = $this->receiptService->getReceipt($params['receipt']);

    if (empty($receipt)) {
      redirectTo('/');
    }

    if ($receipt['transaction_id'] !== $transaction['id']) {
      redirectTo('/');
    }

    $this->receiptService->read($receipt);
  }
  public function delete(array $params)
  {
    $transaction = $this->transactionService->getUserTransaction(
      $params['transaction']
    );

    if (empty($transaction)) {
      redirectTo('/');
    }

    $receipt = $this->receiptService->getReceipt($params['receipt']);

    if (empty($receipt)) {
      redirectTo('/');
    }

    if ($receipt['transaction_id'] !== $transaction['id']) {
      redirectTo('/');
    }

    $this->receiptService->delete($receipt);

    redirectTo('/');
  }
}
