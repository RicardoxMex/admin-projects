<?php
namespace App\Core\Services;

use App\Core\Repositories\TeamRepository;

class TeamService{
    public static function createTeam(int $projectId, string $name="", string $description = ""){
        return TeamRepository::createTeam($projectId, $name, $description);
    }
}