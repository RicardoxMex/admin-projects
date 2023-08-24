<?php

namespace App\Core\Repositories;

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
}