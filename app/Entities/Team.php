<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['slug', 'name', 'description', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }
}