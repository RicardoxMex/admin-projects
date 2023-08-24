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
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $itemsPerPage = 12; // Cambia esto al número deseado de elementos por página

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        $users = Project::paginate($itemsPerPage);

        $currentPage = $users->currentPage();
        $total = $users->total();
        $lastPage = $users->lastPage();
        $nextPageUrl = $users->nextPageUrl();
        $previousPageUrl = $users->previousPageUrl();

        // Verificar si las URLs son null antes de usar str_replace()
        if ($nextPageUrl !== null) {
            $nextPageUrl = str_replace('/', '', $nextPageUrl);
        }

        if ($previousPageUrl !== null) {
            $previousPageUrl = str_replace('/', '', $previousPageUrl);
        }


        $user = currentUser();
        $projects = ProjectService::getProjectsByUserId($user->id);
        Views::setViewPath('projects.index');
        Views::setData([
            'projects' => $users->items(),
            'projectsPerPage' =>$itemsPerPage,
            'totalProjects' => $total,
            'previousPageUrl' => $previousPageUrl,
            'nextPageUrl' => $nextPageUrl
        ]);
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
        echo $slug;
    }
}
