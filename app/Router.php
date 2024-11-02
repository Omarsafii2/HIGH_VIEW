<?php

class Router
{
    private $routes = [];

    // Function to add routes
    public function add($method, $route, $callback)
    {
        // Convert route patterns with {param} to regex
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

    // Define resource routes for user
    public function userResource($controller)
    {
        $this->get('/', "$controller@showlogin");
        $this->get('/register', "$controller@showregister");
        $this->get('/reset', "$controller@showreset");
        $this->get('/forgot', "$controller@showforgot");
        $this->post('/register', "$controller@registerUser");
        $this->post('/login', "$controller@loginUser");
        $this->get('/login', "$controller@showlogin");
        $this->get('/logout', "$controller@logoutUser");
        $this->get('/profile', "$controller@showprofile");
        $this->get('/contact', "$controller@showcontact");
        $this->get('/blog', "$controller@showblog");
    }


    // Function to dispatch routes based on the request
    public function dispatch($requestedRoute)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $requestedRoute = (string)$requestedRoute; // Ensure `$requestedRoute` is a string

        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $route => $callback) {
                if (preg_match($route, $requestedRoute, $matches)) {
                    array_shift($matches); // Remove the full match from the array

                    // Handle controller and method if callback is a string with "@"
                    if (is_string($callback) && strpos($callback, '@') !== false) {
                        list($controllerName, $methodName) = explode('@', $callback);
                        $controllerFile = 'controllers/' . $controllerName . '.php';

                        if (file_exists($controllerFile)) {
                            require_once $controllerFile;
                            $controller = new $controllerName();

                            // Handle POST data if the request is POST
                            $params = $method === 'POST' ? $_POST : $matches;

                            // Call the method with parameters
                            call_user_func_array([$controller, $methodName], [$params]);
                            return;
                        } else {
                            echo "File $controllerFile not found";
                        }
                    } elseif (is_callable($callback)) {
                        call_user_func_array($callback, $matches);
                        return;
                    }
                }
            }
        }

        // Load 404 page if route is not found
        require 'views/pages/404.view.php';
    }
}
