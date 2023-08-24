<?php

use App\Auth\AuthController;
use App\Controllers\HomeController;
use App\Controllers\ProjectsController;

return[
    // Rutas de HomeController
    ['GET', '/', [HomeController::class, 'index']],
    ['GET', '/board', [HomeController::class, 'index']],
    ['GET', '/test', [HomeController::class, 'test']],
    

    // Rutas de AuthController
    ['GET', '/auth', [AuthController::class, 'index']],
    ['GET', '/auth/logout', [AuthController::class, 'logout']],
    ['POST', '/auth/signUp', [AuthController::class, 'signUp']],
    ['POST', '/auth/signIn', [AuthController::class, 'signIn']],

    // Rutas de ProjectsController
    ['GET', '/projects', [ProjectsController::class, 'index']],
    ['GET', '/projects/create', [ProjectsController::class, 'create']],
    ['POST', '/projects/store', [ProjectsController::class,'store']],
    ['GET', '/projects/{slug}', [ProjectsController::class,'show']],
    ['GET', '/projects/{slug}/edit', [ProjectsController::class, 'edit']],
    ['PUT', '/projects/{slug}', [ProjectsController::class, 'update']],

];