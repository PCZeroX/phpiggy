<?php

declare (strict_types = 1);

namespace App\Controllers;

use Framework\TemplateEngine;

class HomeController
{
  public function __construct(private TemplateEngine $view)
  {
  }
  public function home()
  {
    $headerPath = $this->view->resolve("partials/_header.php");
    $footerPath = $this->view->resolve("partials/_footer.php");

    echo $this->view->render("/index.php", [
      'headerPath' => $headerPath,
      'footerPath' => $footerPath,
    ]);
  }
}
