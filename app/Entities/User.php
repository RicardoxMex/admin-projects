<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'username',
        'email',
        'password',
        'full_name',
        'reset_token'
    ];
    public static $rules = [
        'username' => 'required',
        'email' => 'required|valid_email',
        'password' => 'required|min_len,8',
        'confirm_password' => 'required|equalsfield,password',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function loginHistory()
    {
        return $this->hasMany(LoginHistory::class);
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
