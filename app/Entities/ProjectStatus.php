<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    protected $table = 'project_status';
    protected $fillable = ['name', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}