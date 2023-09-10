<?php

namespace App\Core\Repositories;

use App\Entities\Project;
use App\Entities\ProjectStatus;
class ProjectStatusRepository{
    public static function createDefaultStatus(int $project)
    {
        $status = [
            [
                'project_id' => $project,
                'name' => 'To Do'
            ],
            [
                'project_id' => $project,
                'name' => 'In Progress'
            ],
            [
                'project_id' => $project,
                'name' => 'Done'
            ]
        ];
        ProjectStatus::insert($status);
    }


    public static function getStatusesBySlug($slug_project){
        $project = Project::where('slug', $slug_project)->first();
        if($project){
            $statuses = $project->statuses;
            return $statuses;
        }else{
            return null;
        }
        
    }
}