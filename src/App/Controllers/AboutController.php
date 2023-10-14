<?php

declare (strict_types = 1);

namespace App\Controllers;

use Framework\TemplateEngine;

class AboutController
{
  public function __construct(private TemplateEngine $view)
  {
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
