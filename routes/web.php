<?php

use App\Auth\AuthController;
use App\Controllers\HomeController;

return[
    // Rutas de HomeController
    ['GET', '/', [HomeController::class, 'index']],
    ['GET', '/board', [HomeController::class, 'index']],
    

    // Rutas de AuthController
    ['GET', '/auth', [AuthController::class, 'index']],
    ['GET', '/auth/logout', [AuthController::class, 'logout']],
    ['POST', '/auth/signUp', [AuthController::class, 'signUp']],
    ['POST', '/auth/signIn', [AuthController::class, 'signIn']],

];