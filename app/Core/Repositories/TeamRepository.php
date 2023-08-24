<?php

namespace App\Core\Repositories;

use App\Core\Services\ProjectService;
use App\Entities\Team;

class TeamRepository
{
    public static function createTeam(int $project_id, string $name = "", string $description = "")
    {
        $project = ProjectService::getProjectsById($project_id);
        $nameDefault = $name === "" ? "Team $project->name" : $name;
        $team = new Team();
        $team->slug = $project->slug;
        $team->name = $nameDefault;
        $team->description = $description;
        $team->project_id = $project_id;
        $team->save();
    }
}
