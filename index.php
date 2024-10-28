<?php
session_start();
require_once 'core/init.php';

$conn = new conn();
$pdo = $conn->connect();



$routes=[
        '/'=>'views/pages/index.view.php',
        '/shop'=>'views/products/category.view.php',
        '/blog'=>'controller/Article.php',
        '/single-blog'=>'views/pages/singleBlog.view.php',
        '/about'=>'views/pages/about.view.php',
        '/contact'=>'views/pages/contact.view.php',
        '404'=>'controller/_404.php',
        '/login'=>'views/pages/login.view.php',
        '/signup'=>'views/pages/signup.view.php',
        '/cart'=>'controller/Cart.php',
];

if(array_key_exists($_SERVER['REQUEST_URI'],$routes)){
    require $routes[$_SERVER['REQUEST_URI']];
}else{
    require 'controller/_404.php';
}

