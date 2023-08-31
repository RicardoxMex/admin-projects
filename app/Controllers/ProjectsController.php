<?php

namespace App\Controllers;

use App\Core\Services\ProjectService;
use App\Entities\Project;
use App\Utils\Controller;
use App\Utils\Session;
use App\Utils\Views;
use Illuminate\Pagination\Paginator;

class ProjectsController extends Controller
{

    public function index()
    {
        Views::setViewPath('projects.index');
        Views::setTitle('Projects');
        return Views::render();
    }

    public function create()
    {
        Views::setViewPath('projects.create');
        Views::setTitle('Create Project');
        return Views::render();
    }

    public function store($request)
    {
        if (ProjectService::validateRequest()) {
            $user = currentUser();
            $project = ProjectService::createProject($request->name, $request->description, $request->start_date, $request->end_date, $request->priority, $request->budget, $request->estimated_time, $user->id);
            if ($project) {
                return redirect('projects');
            } else {
                exit();
            }
        }
        return redirect('projects/create');
        //successResponse(['errors'=> Session::getSession('errors')], 422);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();
        Views::setViewPath('projects.show');
        Views::setTitle($project->name);
        Views::setData([
            'project' => $project,
        ]);
        return Views::render();
    }
}
