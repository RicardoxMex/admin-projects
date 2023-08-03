<?php

use App\Auth\AuthService;
use App\Utils\CookieManager;
use App\Utils\Session;
use App\Utils\Template;

function route($route = null)
{
    echo HTTP_HOST . '/' . $route;
}

function response(String $message, int $status = 200)
{
    echo json_encode(['status' => $status, 'message' => $message]);
    die();
}

function redirect(String $route = null): void
{
    header("Location:" . HTTP_HOST . '/' . $route);
}

function deb($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function successResponse($data, int $status = 200, string $message = ""): void
{
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode(['data' => $data, 'status' => $status, 'message' => $message]);
    exit();
}

function errorResponse($message= "Error", $status = 400)
{
    $response = [
        'status' => $status,
        'message' => $message,
    ];

    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

function validateResponse($data, $code = 200)
{
    echo json_encode(["validation" => $data, "code" => $code]);
    die();
}

function errors($input)
{
    if (isset($_SESSION['errors'][$input])) {
        return $_SESSION['errors'][$input];
    } else {
        return false;
    }
}

function valueInput($input)
{
    if (isset($input)) {
        return $input;
    }
    return "";
}

function isAuth()
{
    return AuthService::isAuth();
}

function template(string $path, array $data = []): void
{
    $path = str_replace(".", "/", $path);
    $view = new Template('app/Views/templates/' . $path . '.php', [$data]);
    echo $view;
}

function component(string $path, array $data = []): void
{
    $path = str_replace(".", "/", $path);
    $path = 'app/Views/components/' . $path . '.php';
    if (file_exists($path)) {
        $view = new Template($path, [$data]);
        echo $view;
    } else {
        echo "Component not found";
    }
}

function error(string $name)
{
    $message = Session::getSession($name);
    if ($message != false) {
        component("alert", [
            "type" => "error",
            "message" => $message
        ]);
    }
}

function success(string $name)
{
    $message = Session::getSession($name);
    if ($message != false) {
        component("alert", [
            "type" => "success",
            "message" => $message
        ]);
    }
}

function warning(string $name)
{
    $message = Session::getSession($name);
    if ($message != false) {
        component("alert", [
            "type" => "warning",
            "message" => $message
        ]);
    }
}

function img($path)
{
    return IMG . $path;
}

function user()
{
    return CookieManager::getCookie("username");
}
