<?php

namespace App\Auth;


use App\Core\Services\TokenService;
use App\Core\Services\UserService;
use App\Utils\CookieManager;
use App\Utils\Session;

class AuthService
{
    public static function auth(string $email, String $password){
        $user = UserService::getUserbyEmail($email);
        if(!empty($password) && !empty($user->password)){
            if (password_verify($password, $user->password)) {
                return $user;
            }else{
                return false;
            }
        }
    }
    public static function login(string $username, string $password)
    {
        $user = UserService::getUserByUsername($username);
        if(!empty($password) && !empty($user->password)){
            if (password_verify($password, $user->password)) {
                Session::delete("validateUser");
                $token = TokenService::createToken($user->id);
                AuthService::createSession($token->token, $user->username);
                return true;
            }
        }
        Session::setSession("validateUser", "Contraseña o usuario incorrectos");
        return false;
    }

    public static function logout()
    {
        $token = CookieManager::getCookie("token");
        TokenService::deleteToken($token);
        AuthService::deleteSession();
    }

    public static function createSession($token, $username)
    {
        CookieManager::setCookie('token', $token, time() + 2629800, '/');
        CookieManager::setCookie('username', $username, time() + 2629800, '/');
        Session::setSession("token", $token);
        Session::setSession("username", $username);
    }

    public static function deleteSession()
    {
        CookieManager::deleteCookie('token');
        CookieManager::deleteCookie('username');
        Session::destroy();
    }

    public static function Autentication()
    {
        $validation = AuthService::isAuth();
        if (!$validation) {
            redirect('auth');
        }else{
            redirect('');
        }
    }

    public static function isAuth(): bool
    {
        $validation = false;
        $token = CookieManager::getCookie('token');
        if ($token == false) {
            return false;
        } else {
            $validation = TokenService::validateToken($token);
            if (!$validation) {
                return false;
            }
        }
        return true;
    }
}
