<?php

namespace App\Core\Repositories;

use App\Entities\User;
use App\Utils\Request;
use App\Utils\Session;
use Exception;
use GUMP;
use PDOException;

class UserRepository
{

    public static function validateRequest()
    {
        Session::delete("validateUser");
        Session::delete("errors");

        $request = Request::getRequest();

        if($request){
            $request = array($request);
        }else{
            $request = $_POST;
        }
        $gump = new GUMP();
        $rules = User::$rules;
        $gump->validation_rules($rules);
        $gump->run($request);
        if ($gump->is_valid($request, $rules) === true) {
            return true;
        }
        Session::setSession("errors", $gump->get_errors_array());
        Session::setSession('data', (object)$request);
        return false;
    }

    public static function validateRequestApi()
    {
        $request = Request::getRequest();
        $gump = new GUMP();
        $rules = User::$rules;
        $gump->validation_rules($rules);
        $gump->run((array)$request);
        if ($gump->is_valid((array)$request, $rules) === true) {
            return true;
        }
        errorResponse($gump->get_errors_array());
        return false;
    }

    public static function create(string $username, string $email, string  $password)
    {
        try {
            $username_exists = self::getUserByUsername($username);
            $email_exists = self::getUserByEmail($email);
            if ($username_exists === null && $email_exists === null) {
                return User::create([
                    "username" => $username,
                    "email" => $email,
                    "password" => password_hash($password, PASSWORD_DEFAULT)
                ]);
            }

            if ($username_exists !== null && $email_exists === null) {
                Session::setSession("validateUser", "El usuario ya existe");
                errorResponse("El usuario ya existe");
            } else if ($username_exists === null && $email_exists !== null) {
                Session::setSession("validateUser", "El Correo ya existe");
                errorResponse ("El Correo ya existe");
            } else {
                Session::setSession("validateUser", "el usuario y el correo ya existen");
                errorResponse("El usuario ya existe");
            }
            Session::setSession('data', (object)$_POST);
            return null;
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            echo "Error en la consulta: $errorMessage";
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            echo "Error: " . $errorMessage;
        }
    }

    public static function getUserById(int $id)
    {
        return User::find($id);
    }

    public static function getUserByUsername(string $username)
    {
        return User::where('username', $username)->first();
    }

    public static function getUserByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public static function isUser(string $username): bool
    {
        $user = self::getUserByUsername($username);
        if ($user != null) {
            return true;
        }
        return false;
    }
}
