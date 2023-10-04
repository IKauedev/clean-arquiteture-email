<?php

namespace CleanArquiteture\Routes;

class Router {
    private $routes = [];

    public function addRoute($path, $controller) {
        $this->routes[$path] = $controller;
    }

    public function route($url) {
        
        if (!array_key_exists($url, $this->routes)) {
            http_response_code(404);
            echo 'Página não encontrada';
        }
            
        $controllerName = $this->routes[$url];
        $controller = new $controllerName();
        $controller->index();
    }
}