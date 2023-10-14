<?php

declare (strict_types = 1);

require_once __DIR__ . "/../../vendor/autoload.php";

use App\Config\Middleware;
use App\Config\Paths;
use App\Config\Routes;
use Framework\App;

$app        = new App(Paths::SOURCE . "App/container-definitions.php");
$routes     = new Routes();
$middleware = new Middleware();

$routes->registerRoutes($app);
$middleware->registerMiddleware($app);

return $app;
