<?php

namespace App\Controllers\Api;

use App\Core\Services\ProjectService;
use App\Utils\Controller;
use App\Utils\Paginator;
use App\Utils\Request;

class ProjectsController extends Controller
{
    private $user = null;
    public function __construct()
    {
        if (!AuthController::validateToken()) {
            return errorResponse('Unauthorized', 403);
        }
        $this->user = AuthController::validateToken();
    }


    public function index(Request $request)
    {
        $user_id = $request->getParam("user_id");
        if ($user_id === null) {
            $user_id = $this->user->id;
        }

        $projects = ProjectService::getProjectsByUserId($user_id);

        successResponseCustom($projects);
    }

    public function store(Request $request)
    {
        $request = $request->getRequest();
        if (ProjectService::validateRequestAPI()) {
            $projects = ProjectService::createProject($request->name, $request->description, $request->start_date, $request->end_date, $request->priority, $request->budget, $request->estimated_time, $request->user_id);
            successResponse($projects);
        }
    }

    public function show($id)
    {
        $project = ProjectService::getProjectsById($id);

        if ($project != null) {
            successResponse($project);
        }

        errorResponse("Project not found", 404);
    }

    public function destroy($id)
    {
        $project = ProjectService::deleteProject($id);
        $response = [
            "project" => $project,
            "message" => "Project deleted successfully",
            "status" => 200
        ];

        return successResponseCustom($response);
    }

    public function update($id, Request $request)
    {
        $request = $request::getRequest();
        ProjectService::updateProject($request->id, $request->name, $request->description, $request->start_date, $request->end_date, $request->priority, $request->budget, $request->estimated_time);
        successResponseCustom(["message" => "Project updated successfully","status" => 200]);
    }
}