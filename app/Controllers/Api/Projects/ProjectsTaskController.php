<?php
namespace App\Controllers\Api\Projects;
use App\Utils\Controller;
use App\Utils\Request;

class ProjectsTaskController extends Controller
{
    public function index($project){
        echo $project;
    }
}