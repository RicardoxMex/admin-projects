<?php

namespace App\Utils;

class Session
{
    //iniciamos la session
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
    }

    //obtenemos el valor de uno de los indices de session
    public static function getSession(string $name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    }

    //Inicializamos el valor de uno de los inidice de sesion
    public static function setSession(string $name, $data): void
    {
        $_SESSION[$name] = $data;
    }

    public static function delete(string $name): void
    {
        unset($_SESSION[$name]);
    }

    //destruye la sesion
    public static function destroy()
    {
        @session_destroy();
    }
}
