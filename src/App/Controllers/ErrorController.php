<?php

declare (strict_types = 1);

namespace App\Controllers;

use Framework\TemplateEngine;

class ErrorController
{
  public function __construct(private TemplateEngine $view)
  {
  }

  public function notFound()
  {
    $headerPartial = $this->view->resolve("partials/_header.php");
    $footerPartial = $this->view->resolve("partials/_footer.php");

    echo $this->view->render("errors/not-found.php", [
      'headerPartial' => $headerPartial,
      'footerPartial' => $footerPartial,
    ]);
  }
}
