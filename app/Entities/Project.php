<?php
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'description',
        'start_date',
        'end_date',
        'status',
        'progress',
        'priority',
        'budget',
        'estimated_time',
        'user_id',
    ];

    public static $rules = [
        'name' => 'required|max_len,240',
        'description' => 'required|max_len,240',
        'start_date' => 'required|date,Y-m-d',
        'end_date' => 'required|date,Y-m-d',
        'priority'=>'required|contains,low;medium;high',
        'budget' =>'required|float|min_numeric,0',
        'estimated_time' =>'required|float|min_numeric,0',
        'user_id'=>'required|integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}