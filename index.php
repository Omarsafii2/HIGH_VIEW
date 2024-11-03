<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';
require 'functions.php';
require 'app/Router.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();

// Define routes
$router->get('/', 'ProductController@index');
$router->get('/products', 'ProductController@show');
$router->get('/blog', 'ArticleController@show');
$router->get('/category', 'ProductController@showCategory');
$router->get('/discount', 'ProductController@showDiscount');
$router->get('/product', 'ProductController@showProduct');
$router->get('/best-seller', 'ProductController@showBestSeller');
$router->get('/packages', 'ProductController@showPackage');
$router->get('/latest-products', 'ProductController@showLatestProducts');
$router->get('/cart', 'CartController@showCart');
$router->post('/cart/update', 'CartController@updateCart');
$router->get('/confirmation/{id}', 'OrderController@confirmation');
$router->post('/cart/delete/{id}', 'CartController@deleteFromCart');
$router->post('/cart/coupon', 'CartController@applyCoupon');

// Dispatch the current request URI
$requestedRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestedRoute);
