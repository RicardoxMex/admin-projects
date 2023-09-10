<?php
namespace App\Core\Services;
use App\Core\Repositories\ProjectStatusRepository;


class ProjectStatusService{
    public static function getStatusesBySlug($slug_project){
        return ProjectStatusRepository::getStatusesBySlug($slug_project);
    }
}