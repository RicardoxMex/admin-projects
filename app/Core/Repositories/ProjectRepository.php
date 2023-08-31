<?php

namespace App\Core\Repositories;

use App\Core\Services\ProjectService;
use App\Core\Services\TeamService;
use App\Core\Services\UserService;
use App\Entities\Project;
use App\Utils\CookieManager;
use App\Utils\Request;
use Illuminate\Support\Str;
use App\Utils\Session;
use GUMP;
use PDOException;

class ProjectRepository
{
    public static function validateRequest(): bool
    {
        Session::delete("errors");
        Session::delete('data');
        $request = Request::getRequest();
        if ($request) {
            $request = (array) $request;
        } else {
            $request = $_POST;
        }
        $gump = new GUMP();
        $rules = Project::$rules;
        $gump->validation_rules($rules);
        $gump->run($request);
        if ($gump->is_valid($request, $rules) === true) {
            return true;
        }
        Session::setSession("errors", $gump->get_errors_array());
        Session::setSession('data', (object) $request);
        return false;
    }

    public static function validateRequestAPI(): bool
    {
        Session::delete("errors");
        Session::delete('data');
        $request = Request::getRequest();
        if ($request) {
            $request = (array) $request;
        } else {
            $request = $_POST;
        }
        $gump = new GUMP();
        $rules = Project::$rules;
        $gump->validation_rules($rules);
        $gump->run($request);
        if ($gump->is_valid($request, $rules) === true) {
            return true;
        }
        Session::setSession("errors", $gump->get_errors_array());
        Session::setSession('data', (object) $request);
        errorResponse($gump->get_errors_array());
        return false;
    }

    public static function createProject(string $name, string $description, string $startDate, string $endDate, string $priority, $budget, string $estimated_time, int $userId)
    {

        try {
            $user = UserService::getUserById($userId);
            if(!$user){
                errorResponse("User not found", 404);
            }
            $project = new Project();
            $username = UserService::getUserById($userId)->username;
            $slug = Str::slug($name . '-' . $username);

            if (!self::existsProjectBySlug($slug)) {
                $project->slug = $slug;
            } else {
                $counSlugs = Project::where('slug', 'LIKE', '%-mexan10%')->count();
                if ($counSlugs > 0) {
                    $counSlugs = $counSlugs + 1;
                    $project->slug = $slug . '-' . $counSlugs++;
                }
            }

            $project->name = $name;
            $project->description = $description;
            $project->start_date = $startDate;
            $project->end_date = $endDate;
            $project->priority = $priority;
            $project->budget = $budget;
            $project->estimated_time = $estimated_time;
            $project->user_id = $userId;
            $project->save();
            ProjectStatusRepository::createDefaultStatus($project->id);
            TeamService::createTeam($project->id);
        } catch (PDOException $e) {
            errorResponse($e->getMessage());
        }
        return $project;
    }

    public static function updateProject(int $id, string $name, string $description, string $startDate, string $endDate, string $priority, $budget, string $estimated_time)
    {
        try {
            $project = self::getProjectsById($id);
            if ($project) {
                $project->name = $name;
                $project->description = $description;
                $project->start_date = $startDate;
                $project->end_date = $endDate;
                $project->priority = $priority;
                $project->budget = $budget;
                $project->estimated_time = $estimated_time;
                $project->save();
                return $project;
            }else {
                errorResponse("Couldn't find project", 404);
            }
            
        } catch (PDOException $e) {
            errorResponse("Error updating project");
        }
    }

    public static function getProjectsbyUserId($userId)
    {
        $projects = Project::where('user_id', $userId)->get();
        return $projects;
    }

    public static function getProjectsById($projectId)
    {
        $project = Project::find($projectId);
        return $project;
    }

    public static function existsProjectBySlug($slug)
    {
        return Project::where('slug', $slug)->exists();
    }

    public static function deleteProject($id)
    {
        $project = Project::find($id);
        $project->delete();
        return $project;
    }
}