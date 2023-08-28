<?php
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectPermission extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'display_name', 'description'];
}