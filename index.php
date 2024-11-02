<?php
require  'vendor/autoload.php';
require 'functions.php';
require 'app/Router.php';
session_start();


$dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();
$router->get('/', 'UserDashboardController@index');
$router->get('/products', 'ProductController@show');
$router->get('/blog', 'ArticleController@show');
$router->get('/blog/{id}', 'ArticleController@showSingle');
$router->get('/user', 'UserDashboardController@show');
$router->get('/user/profile', 'UserDashboardController@showUser');
$router->get('/user/privacy', 'UserDashboardController@showPivacyPage');
$router->get('/user/fav', 'UserDashboardController@getFaviorte');
$router->get('/user/review', 'UserDashboardController@showreview');
$router->get('/user/help', 'UserDashboardController@showHelpPage');
$router->get('/user/contact', 'UserDashboardController@showContact');
$router->get('/user/order', 'UserDashboardController@showOrderHistory');
$router->get('/user/order/cancel/{id}/{status}', 'UserDashboardController@cancelOrder');
$router->post('/user/edit', 'UserDashboardController@edit');
$router->get('/about', 'AboutUsController@aboutUs');
$router->get('/search', 'SearchController@handleSearch');
$router->get('/cart', 'CartController@showCart');
$router->post('/cart/delete/{id}', 'CartController@deleteFromCart');
$router->post('/cart/coupon', 'CartController@applyCoupon');
$router->post('/cart/update', 'CartController@updateCart');




////////////////////////////////////////////
$router->get('/login', "UserController@showlogin");
$router->get('/register', "UserController@showregister");
$router->get('/reset', "UserController@showreset");
$router->get('/forgot', "UserController@showforgot");
$router->post('/register', "UserController@registerUser");
$router->post('/login', "UserController@loginUser");
$router->get('/logout', "UserController@logoutUser");
$router->get('/blog', "UserController@showblog");
$router->get('/forgot', "UserController@showforgot");
///////////////////////////////////////////////
$router->get('/contact', "ContactController@showContact");






// Dispatch the current request URI
// Dispatch the request
$requestedRoute = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//dd($requestedRoute);
// Dispatch the route
$router->dispatch($requestedRoute);

