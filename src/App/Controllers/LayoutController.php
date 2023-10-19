<?php

namespace App\Controllers;

use App\Services\UserService;
use App\Services\ValidatorService;
use Framework\TemplateEngine;

abstract class LayoutController
{

  public function __construct(
    protected TemplateEngine $view,
    protected ValidatorService $validatorService,
    protected UserService $userService,
  ) {
  }

  protected function getPartials()
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
