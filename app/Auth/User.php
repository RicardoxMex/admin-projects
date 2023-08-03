<?php

namespace App\Auth;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'reset_token', 'password'];

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
}
