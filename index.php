<?php
require  'vendor/autoload.php';
require 'functions.php';
require 'app/Router.php';



$dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();

$router->get('/', 'UserController@index');
$router->get('/products', 'ProductController@show');
$router->get('/blog', 'ArticleController@show');
$router->get('/category', 'ProductController@show');
$router->post('/category', 'ProductController@filter');
$router->get('/category/filter', 'ProductController@categoryFilter');
$router->post('/category/filter', 'ProductController@filterProducts');
$router->get('/category/details', 'productController@showDetails'); 
$router->post('/category/details/create', 'FavoriteController@store');
$router->post('/category/details/addCart', 'CartItemsController@store');
$router->post('/review/store', 'ReviewController@store');








// Dispatch the current request URI
// Dispatch the request
$requestedRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//dd($requestedRoute);
// Dispatch the route
$router->dispatch($requestedRoute);


