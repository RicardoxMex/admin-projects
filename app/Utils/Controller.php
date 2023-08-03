<?php
namespace App\Utils;
class Controller
{
    public function __construct()
    {
        ob_clean();
        Session::start();
    }
}
