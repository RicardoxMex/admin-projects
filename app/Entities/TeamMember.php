<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = ['user_id', 'team_id', 'project_role_id', 'invitation_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function role()
    {
        return $this->belongsTo(ProjectRole::class, 'project_role_id');
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'assignmens', 'team_member_id', 'task_id');
    }
}