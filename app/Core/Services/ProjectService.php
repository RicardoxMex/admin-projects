<?php

namespace App\Core\Services;

use App\Core\Repositories\ProjectRepository;

class ProjectService
{
    public static function validateRequest(): bool
    {
        return ProjectRepository::validateRequest();
    }

    public static function createProject(string $name, string $description,  string $startDate, string $endDate, string $priority, $budget, string $estimate,  $userId)
    {
        return ProjectRepository::createProject($name, $description, $startDate, $endDate, $priority, $budget, $estimate, $userId);
    }

    public static function getProjectsByUserId($userId)
    {
        return ProjectRepository::getProjectsByUserId($userId);
    }

    public static function getProjectsById($projectId){
        return ProjectRepository::getProjectsById($projectId);
    }
}
