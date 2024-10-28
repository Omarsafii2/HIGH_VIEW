<?php

require_once 'model/Dbconn.php';
$conn = new conn();
$pdo = $conn->connect();



$routes = [
    '/' => 'views/pages/index.view.php',
    '/shop' => 'views/products/category.php',
    '/blog' => 'views/pages/blog.view.php',
    '/single-blog' => 'views/pages/singleBlog.view.php',
    '/about' => 'views/pages/about.view.php',
    '/contact' => 'views/pages/contact.view.php',
    '404' => 'views/pages/404.view.php',
    '/register' => 'views/pages/register.php',
    '/login' => 'views/pages/login.view.php',
    '/cart' => 'views/products/cart.php',
];

if (array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
    require $routes[$_SERVER['REQUEST_URI']];
} else {
    require 'views/pages/404.view.php';
}
