<?php

use App\Controllers\Api\AuthController;
use App\Controllers\Api\ProjectsController;
use FastRoute\RouteCollector;

return[
    // Rutas de HomeController
    ['GET', '/api/auth/token', [AuthController::class, 'validateTokenAPI']],
    ['POST', '/api/auth', [AuthController::class, 'auth']],
    ['GET', '/api/users', [AuthController::class, 'users']],
    ['POST', '/api/auth/signin', [AuthController::class, 'signin']],

    //Rutas ProjectsController
    ['GET', '/api/projects', [ProjectsController::class, 'index']],
    ['POST', '/api/projects', [ProjectsController::class, 'store']],
    ['GET', '/api/projects/{id}', [ProjectsController::class, 'show']]
];