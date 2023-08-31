<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    protected $fillable = ['slug', 'name', 'description', 'priority', 'start_date', 'end_date', 'stimated_time', 'project_id', 'status_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function status()
    {
        return $this->belongsTo(ProjectStatus::class, 'status_id');
    }

    public function teamMembers()
    {
        return $this->belongsToMany(TeamMember::class, 'assignmens', 'task_id', 'team_member_id');
    }
}