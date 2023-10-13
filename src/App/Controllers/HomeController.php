<?php

declare (strict_types = 1);

namespace App\Controllers;

use App\Config\Paths;
use Framework\TemplateEngine;

class HomeController
{
  private TemplateEngine $view;

  public function __construct()
  {
    $this->view = new TemplateEngine(Paths::VIEW);
  }
  public function home()
  {
    $headerPath = $this->view->resolve("partials/_header.php");
    $footerPath = $this->view->resolve("partials/_footer.php");

    echo $this->view->render("/index.php", [
      'title'      => 'Homepage 🤖',
      'headerPath' => $headerPath,
      'footerPath' => $footerPath,
    ]);
  }
}
