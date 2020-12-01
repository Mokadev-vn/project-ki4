<?php
use Core\Router;

$router = new Router();

//home
$router->get('/', 'App\Controllers\HomeController@index');
$router->post('/login', 'App\Controllers\HomeController@login');
$router->post('/register', 'App\Controllers\HomeController@register');

$router->get('/login', 'App\Controllers\HomeController@pageLogin');

$router->get('/test', 'App\Controllers\User\TestController@index');

$router->get('/list-job', 'App\Controllers\JobController@index');

$router->get('/user', 'App\Controllers\User\AccountController@index');

$router->execute();
