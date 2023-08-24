<?php
namespace App\Controllers;

use App\Core\Services\ProjectService;
use App\Utils\Views;

class HomeController{
    public function index(){
        Views::setTitle('Home');
        Views::setViewPath('home.index');
        return Views::render();
    }
    public function test(){
        ProjectService::createProject('project', 'description','2023-08-11', '2023-08-11', 'low', 12.2, 12, 1);

        redirect('projects');
    }
}