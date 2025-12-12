<?php

class Router {
    private $routes = [];
    private $uri;
    private $method;

    public function __construct() {
        $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function get($path, $controller, $action = null) {
        $this->addRoute('GET', $path, $controller, $action);
    }

    public function post($path, $controller, $action = null) {
        $this->addRoute('POST', $path, $controller, $action);
    }

    private function addRoute($method, $path, $controller, $action) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch() {
        // Ordenar rutas: primero las que no tienen parámetros, luego las que sí
        usort($this->routes, function($a, $b) {
            $aHasParams = strpos($a['path'], '{') !== false;
            $bHasParams = strpos($b['path'], '{') !== false;
            
            // Las rutas sin parámetros primero
            if ($aHasParams && !$bHasParams) return 1;
            if (!$aHasParams && $bHasParams) return -1;
            
            // Si ambas tienen o no tienen parámetros, ordenar por número de segmentos
            $aSegments = count(explode('/', trim($a['path'], '/')));
            $bSegments = count(explode('/', trim($b['path'], '/')));
            return $bSegments - $aSegments;
        });

        foreach ($this->routes as $route) {
            if ($this->matchRoute($route)) {
                $this->executeRoute($route);
                return;
            }
        }
        
        // Si no hay coincidencia, mostrar página por defecto
        new Controller;
    }

    private function matchRoute($route) {
        // Verificar método HTTP
        if ($route['method'] !== $this->method) {
            return false;
        }

        // Convertir patrón de ruta a regex
        $pattern = $this->pathToRegex($route['path']);
        
        return preg_match($pattern, $this->uri);
    }

    private function pathToRegex($path) {
        // Si no tiene parámetros, escapar todo
        if (strpos($path, '{') === false) {
            return '#^' . preg_quote($path, '#') . '$#';
        }
        
        // Primero reemplazar parámetros {id} con marcador temporal
        $pattern = preg_replace('/\{(\w+)\}/', '__PARAM__', $path);
        // Escapar caracteres especiales
        $pattern = preg_quote($pattern, '#');
        // Reemplazar marcador temporal con regex para números
        $pattern = str_replace('__PARAM__', '(\d+)', $pattern);
        // Agregar delimitadores
        return '#^' . $pattern . '$#';
    }

    private function executeRoute($route) {
        $params = $this->extractParams($route['path']);
        
        $controllerName = $route['controller'];
        $controller = new $controllerName;
        
        if ($route['action']) {
            if (!empty($params)) {
                call_user_func_array([$controller, $route['action']], $params);
            } else {
                $controller->{$route['action']}();
            }
        }
        // Si no hay acción, el constructor del controlador ya se ejecutó
    }

    private function extractParams($path) {
        $params = [];
        $pathParts = explode('/', trim($path, '/'));
        $uriParts = explode('/', trim($this->uri, '/'));

        foreach ($pathParts as $index => $part) {
            if (preg_match('/\{(\w+)\}/', $part, $matches)) {
                if (isset($uriParts[$index]) && is_numeric($uriParts[$index])) {
                    $params[] = (int)$uriParts[$index];
                }
            }
        }

        return $params;
    }
}

