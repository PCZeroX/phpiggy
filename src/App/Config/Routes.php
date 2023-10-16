<?php

declare (strict_types = 1);

namespace App\Config;

use App\Controllers\AboutController;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Middleware\AuthRequiredMiddleware;
use App\Middleware\GuestOnlyMiddleware;
use Framework\App;

class Routes
{
  public function registerRoutes(App $app)
  {
    $app->get('/', [HomeController::class, 'home'])->add(AuthRequiredMiddleware::class);
    $app->get('/about', [AboutController::class, 'about']);
    $app->get('/register', [AuthController::class, 'registerView'])->add(GuestOnlyMiddleware::class);
    $app->post('/register', [AuthController::class, 'register'])->add(GuestOnlyMiddleware::class);
    $app->get('/login', [AuthController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
    $app->post('/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class);
    $app->get('/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);

  }
}
