<?php
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;


class ProjectPermission extends Model
{
    protected $fillable = ['name', 'display_name', 'description'];
}