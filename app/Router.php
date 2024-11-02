<?php

class Router
{
    private $routes = [];

    public function add($method, $route, $callback)
    {
        // Pattern allows routes with optional parameters
        $routePattern = preg_replace('/\{[a-zA-Z]+\}/', '([a-zA-Z0-9_-]+)', $route);
        $this->routes[$method]['#^' . $routePattern . '$#'] = $callback;
    }

    public function get($route, $callback)
    {
        $this->add('GET', $route, $callback);
    }

    public function post($route, $callback)
    {
        $this->add('POST', $route, $callback);
    }

    public function dispatch($requestedRoute, $data = null)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $requestedRoute = (string)$requestedRoute;  // Ensure `$requestedRoute` is a string

        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $route => $callback) {
                if (preg_match($route, $requestedRoute, $matches)) {
                    array_shift($matches);  // Remove full match, keep only parameters

                    if (is_string($callback) && strpos($callback, '@') !== false) {
                        list($controllerName, $methodName) = explode('@', $callback);
                        $controllerFile = 'controllers/' . $controllerName . '.php';

                        if (file_exists($controllerFile)) {
                            require_once $controllerFile;
                            $controller = new $controllerName();

                            // Pass POST data to the method if it exists
                            if ($method === 'POST' && $data) {
                                call_user_func_array([$controller, $methodName], array_merge($matches, [$data]));
                            } else {
                                call_user_func_array([$controller, $methodName], $matches);
                            }
                            return;
                        }
                    } elseif (is_callable($callback)) {
                        call_user_func_array($callback, $matches);
                        return;
                    }
                }
            }
        }

        // Default to 404 page if route is not found
        require 'views/pages/404.view.php';
    }
}
