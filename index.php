<?php

require 'functions.php';
require 'migrations/2024_10_22_create_products_table.php';
require_once 'database.php';

$db=new Database();
$pdo=$db->getConnection();

$routes=[
        '/'=>'views/pages/index.view.php',
        '/shop'=>'views/products/category.php',
        '/blog'=>'views/pages/blog.view.php',
        '/about'=>'views/pages/about.view.php',
        '/contact'=>'views/pages/contact.view.php',
        '404'=>'views/pages/404.view.php',
        'login'=>'views/pages/login.view.php',
        'signup'=>'views/pages/signup.view.php',
        'cart'=>'views/pages/cart.view.php',
];

if(array_key_exists($_SERVER['REQUEST_URI'],$routes)){
    require $routes[$_SERVER['REQUEST_URI']];
}else{
    require 'views/pages/404.view.php';
}

