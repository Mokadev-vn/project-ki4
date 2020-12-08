<?php
use Core\Router;

$router = new Router();

//home
$router->get('/', 'App\Controllers\HomeController@index');
$router->middleware('falseLogin')->post('/login', 'App\Controllers\HomeController@login');
$router->middleware('falseLogin')->post('/register', 'App\Controllers\HomeController@register');

$router->middleware('AuthAdmin')->group('/admin',[
    ['GET', '', 'App\Controllers\Admin\HomeController@index'],
]);


$router->get('/list-job', 'App\Controllers\JobController@index');

$router->middleware('checkLogin')->get('/user', 'App\Controllers\User\AccountController@index');

$router->execute();
