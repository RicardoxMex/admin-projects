<?php
require_once "./vendor/autoload.php";
$rootPath = realpath(__DIR__ . '/..');
$dotenv = Dotenv\Dotenv::createImmutable($rootPath);
$dotenv->load();

require_once './config.php';
require_once "./config/database.php";

if(DEV){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    ini_set('html_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', 'php_errors.log');
    require_once "./minify.php";
}