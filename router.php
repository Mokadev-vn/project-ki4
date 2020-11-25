<?php

use Core\Router;
use Core\App;


$router = new Router();

//home
$router->get('/', 'App\Controllers\HomeController@index');
$router->post('/login', 'App\Controllers\HomeController@login');
$router->post('/register', 'App\Controllers\HomeController@register');

$router->get('/test', 'App\Controllers\User\TestController@index');


$router->execute();
