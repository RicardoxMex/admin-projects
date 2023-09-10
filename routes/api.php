<?php

use App\Controllers\Api\AuthController;
use App\Controllers\Api\Projects\ProjectsController;
use App\Controllers\Api\Projects\ProjectsStatusController;
use App\Controllers\Api\Projects\ProjectsTaskController;

return[
    // Rutas de HomeController
    ['GET', '/api/auth/token', [AuthController::class, 'validateTokenAPI']],
    ['POST', '/api/auth', [AuthController::class, 'auth']],
    ['GET', '/api/users', [AuthController::class, 'users']],
    ['POST', '/api/auth/signin', [AuthController::class, 'signin']],

    //Rutas ProjectsController
    ['GET', '/api/projects', [ProjectsController::class, 'index']],
    ['POST', '/api/projects', [ProjectsController::class, 'store']],
    ['GET', '/api/projects/{id}', [ProjectsController::class, 'show']],
    ['DELETE', '/api/projects/{id}', [ProjectsController::class, 'destroy']],
    ['PUT', '/api/projects/{id}', [ProjectsController::class, 'update']],

    // Rutas de Projects-Task (Tareas)
    ['GET', '/api/projects/{project_id}/tasks', [ProjectsTaskController::class, 'index']],
    ['POST', '/api/projects/{project_id}/tasks', [ProjectsTaskController::class, 'store']],
    ['GET', '/api/projects/{project_id}/tasks/{task_id}', [ProjectsTaskController::class, 'show']],
    ['DELETE', '/api/projects/{project_id}/tasks/{task_id}', [ProjectsTaskController::class, 'destroy']],
    ['PUT', '/api/projects/{project_id}/tasks/{task_id}', [ProjectsTaskController::class, 'update']],

    // Rutas de Projects-Status (Estados)
    ['GET', '/api/projects/{project_id}/status', [ProjectsStatusController::class, 'index']],
    ['POST', '/api/projects/{project_id}/status', [ProjectsStatusController::class, 'store']],
    ['GET', '/api/projects/{project_id}/status/{status_id}', [ProjectsStatusController::class, 'show']],
    ['DELETE', '/api/projects/{project_id}/status/{status_id}', [ProjectsStatusController::class, 'destroy']],
    ['PUT', '/api/projects/{project_id}/status/{status_id}', [ProjectsStatusController::class, 'update']],
];