<?php
namespace App\Utils;
class Controller
{
    public function __construct()
    {
        if (ob_get_length()) {
            ob_clean();
        }
        Session::start();
    }
}
