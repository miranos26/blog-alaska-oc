<?php

namespace Core\Router;

Class Router {

    protected $routes = [];

    public function addRoute($name, $url, $controller, $method){
        $this->routes[] = [
            'name' => $name,
            'url' => $url,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function match($url)
    {

        foreach ($this->routes as $route) {
            if (preg_match('#^' . $route['url'] . '$#i', $url, $matches)) {
                $route['matches'] = $matches;
                return $route;
            }
        }
        return false;

    }
}