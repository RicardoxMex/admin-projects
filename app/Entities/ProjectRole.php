<?php
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;

class ProjectRole  extends Model
{
    protected $fillable = ['name', 'description'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(ProjectPermission::class, 'project_roles_has_project_permissions', 'project_role_id', 'project_permission_id');
    }

    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }
}