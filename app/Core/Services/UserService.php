<?php

namespace App\Core\Services;

use App\Core\Repositories\UserRepository;

class UserService
{

    public static function getUserById(int $id)
    {
        return UserRepository::getUserById($id);
    }

    public static function getUserByUsername(string $username)
    {
        return UserRepository::getUserByUsername($username);
    }

    public static function create(string $username, string $email, string $password)
    {
        return UserRepository::create($username, $email, $password);
    }
    public static function validateRequest(){
        return UserRepository::validateRequest();
    }

    public static function validateRequestApi(){
        return UserRepository::validateRequestApi();
    }

    public static function  isUser(string $username){
        return UserRepository::isUser($username);
    }

    public static function getUserbyEmail(string $email){
        return UserRepository::getUserbyEmail($email);
    }
}
