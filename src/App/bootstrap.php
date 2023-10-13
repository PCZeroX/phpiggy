<?php

declare (strict_types = 1);

require_once __DIR__ . "/../../vendor/autoload.php";

use App\Config\Routes;
use Framework\App;

$app    = new App();
$routes = new Routes();

$routes->registerRoutes($app);

return $app;
