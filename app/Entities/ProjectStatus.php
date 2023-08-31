<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectStatus extends Model
{
    use SoftDeletes;
    protected $table = 'project_status';
    protected $fillable = ['name', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}