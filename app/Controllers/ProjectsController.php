<?php
namespace App\Controllers;
use App\Utils\Controller;
use App\Utils\Views;

class ProjectsController extends Controller {

    public function index() {
        Views::setViewPath('projects.index');
        Views::setTitle('Projects');
        return Views::render();
    }
    
    public function create() {
        Views::setViewPath('projects.create');
        Views::setTitle('Create Project');
        return Views::render();
    }
}