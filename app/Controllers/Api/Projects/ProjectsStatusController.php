<?php
namespace App\Controllers\Api\Projects;
use App\Core\Services\ProjectStatusService;
use App\Entities\Project;
use App\Utils\Controller;
use App\Utils\Request;

class ProjectsStatusController extends Controller
{
    public function index($projectSlug){
        $project = ProjectStatusService::getStatusesBySlug($projectSlug);
        if ($project) {
            successResponse($project);
        }else{
            errorResponse("Not Found", 404);
        }
    }
}