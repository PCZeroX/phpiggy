<?php

declare (strict_types = 1);

namespace App\Controllers;

use App\Services\ValidatorService;
use Framework\TemplateEngine;

class AuthController
{
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService
  ) {
  }

  public function registerView()
  {
    $headerPartial = $this->view->resolve("partials/_header.php");
    $footerPartial = $this->view->resolve("partials/_footer.php");

    echo $this->view->render("register.php", [
      'headerPartial' => $headerPartial,
      'footerPartial' => $footerPartial,
    ]);
  }

  public function register()
  {
    $this->validatorService->validateRegister($_POST);
  }
}
