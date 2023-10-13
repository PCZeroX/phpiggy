<?php

declare (strict_types = 1);

namespace App\Controllers;

use App\Config\Paths;
use Framework\TemplateEngine;

class AboutController
{
  private TemplateEngine $view;

  public function __construct()
  {
    $this->view = new TemplateEngine(Paths::VIEW);
  }

  public function about()
  {
    $headerPartial = $this->view->resolve("partials/_header.php");
    $footerPartial = $this->view->resolve("partials/_footer.php");

    echo $this->view->render('about.php', [
      'title'         => 'About',
      'headerPartial' => $headerPartial,
      'footerPartial' => $footerPartial,
      'dangerousData' => '<script>alert(123)</script>',
    ]);
  }
}
