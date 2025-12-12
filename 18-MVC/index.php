<?php

require_once 'application/bootstrap.php';

// Cargar rutas
$routes = require 'application/config/routes.php';

// Crear router y registrar rutas
$router = new Router;

foreach ($routes as $route) {
    [$method, $path, $controller, $action] = $route;
    
    if ($method === 'GET') {
        $router->get($path, $controller, $action);
    } elseif ($method === 'POST') {
        $router->post($path, $controller, $action);
    }
}

// Despachar la ruta
$router->dispatch();
