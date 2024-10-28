<?php
require 'vendor/autoload.php';
require 'functions.php';
require 'app/Router.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();
$router->get('/', 'UserController@index');
$router->get('/products', 'ProductController@show');
$router->get('/blog/showArticle', 'ArticleController@showArticle');

// Dispatch the current request URI
$router->dispatch(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
