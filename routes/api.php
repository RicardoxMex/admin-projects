<?php

use App\Controllers\Api\AuthController;
use FastRoute\RouteCollector;

return[
    // Rutas de HomeController
    ['POST', '/api/auth', [AuthController::class, 'auth']],
    ['GET', '/api/users', [AuthController::class, 'users']],
];