<?php

use App\Utils\Request;
use FastRoute\RouteCollector;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\PaginatorInterface;

// Permite el origen específico desde el que se está haciendo la solicitud
header("Access-Control-Allow-Origin: *");

// Permite los métodos de solicitud que se permiten
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

// Permite las cabeceras que se pueden incluir en la solicitud
header("Access-Control-Allow-Headers: authorization, content-type"); // Agrega 'authorization' a las cabeceras permitidas

// Permite que las cookies se incluyan en la solicitud (si es necesario)
header('Access-Control-Allow-Credentials: true');
try {
    require_once __DIR__.'/public/index.php';
require_once __DIR__.'/app/Utils/Helpers.php';

// Combina las rutas de web.php y api.php
$webRoutes = require __DIR__.'/routes/web.php';
$apiRoutes = require __DIR__.'/routes/api.php';
$routes = array_merge($webRoutes, $apiRoutes);

// Crea el enrutador
$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) use ($routes) {
    foreach ($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Elimina la cadena de consulta (?foo=bar) y fragmento (#hash) de la URI
if (($pos = strpos($uri, '?')) !== false) {
    $uri = substr($uri, 0, $pos);
}
if (($pos = strpos($uri, '#')) !== false) {
    $uri = substr($uri, 0, $pos);
}

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // Manejo de rutas no encontradas
        echo "Error 404: Página no encontrada";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        // Manejo de métodos no permitidos (ejemplo: ruta definida para POST, pero se accede con GET)
        echo "Error 405: Método no permitido";
        break;
    case FastRoute\Dispatcher::FOUND:
        // Ruta encontrada, llamamos al controlador y método correspondientes
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$controllerName, $methodName] = $handler;
        $controller = new $controllerName();
        // Pasa todos los parámetros del array $vars al método del controlador
        $request_method = $_SERVER["REQUEST_METHOD"];
        $request = new Request();
        // Crea un array con los argumentos para llamar al método del controlador
        $args = array_merge(array_values($vars), [$request]);

        // Verifica si hay un parámetro PaginatorInterface en los argumentos
        $controllerReflection = new ReflectionMethod($controllerName, $methodName);
        if (in_array(PaginatorInterface::class, $controllerReflection->getParameters())) {
            
            // Crea un Paginator
            $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $itemsPerPage = 10; // Cambia esto al número deseado de elementos por página
            $paginator = new Paginator(new Illuminate\Pagination\LengthAwarePaginator([], 0, $itemsPerPage, $currentPage));

            // Agrega el PaginatorInterface al final de los argumentos
            $args[] = $paginator;
        }

        // Llama al método del controlador con los argumentos adecuados
        $controllerReflection->invokeArgs($controller, $args);
        break;
}

} catch (\Throwable $th) {
    echo $th->getMessage();
}
