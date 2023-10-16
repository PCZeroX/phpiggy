<?php

declare (strict_types = 1);

namespace App\Controllers;

use App\Services\UserService;
use App\Services\ValidatorService;
use Framework\TemplateEngine;

class AuthController
{

  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService,
    private UserService $userService,
  ) {
  }

  public function registerView()
  {
    $partials = $this->getPartials();

    echo $this->view->render("register.php", $partials);
  }
  public function register()
  {
    $this->validatorService->validateRegister($_POST);

    $this->userService->isEmailTaken($_POST['email']);

    $this->userService->create($_POST);

    redirectTo('/');
  }
  public function loginView()
  {
    $partials = $this->getPartials();

    echo $this->view->render("login.php", $partials);
  }
  public function login()
  {
    $this->validatorService->validateLogin($_POST);

    $this->userService->login($_POST);

    redirectTo('/');
  }
  public function logout()
  {
    $this->userService->logout();

    redirectTo('/login');
  }

  private function getPartials()
  {
    $headerPartial = $this->view->resolve("partials/_header.php");
    $footerPartial = $this->view->resolve("partials/_footer.php");
    $csrfPartial   = $this->view->resolve("partials/_csrf.php");

    return [
      'headerPartial' => $headerPartial,
      'footerPartial' => $footerPartial,
      'csrfPartial'   => $csrfPartial,
    ];
  }
}
