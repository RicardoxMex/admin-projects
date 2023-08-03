<?php
namespace App\Controllers;

use App\Utils\Views;

class HomeController{
    public function index(){
        Views::setTitle('Home');
        Views::setViewPath('home.index');
        return Views::render();
    }
}