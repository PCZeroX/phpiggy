<?php

declare (strict_types = 1);

require_once __DIR__ . "/../../vendor/autoload.php";

use App\Controllers\HomeController;
use Framework\App;

$app = new App();

$app->get('/', [HomeController::class, 'home']);

return $app;
