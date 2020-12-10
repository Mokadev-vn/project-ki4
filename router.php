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

$router->middleware('checkLogin')->get('/dashboard', 'App\Controllers\User\AccountController@index');
$router->middleware('User')->get('/user-profile', 'App\Controllers\User\AccountController@profile');
$router->middleware('User')->post('/user-profile', 'App\Controllers\User\AccountController@postProfile');

$router->middleware('Company')->get('/post-job', 'App\Controllers\HomeController@postJob');
$router->middleware('Company')->get('/company-profile', 'App\Controllers\User\CompanyController@profile');
$router->middleware('Company')->post('/company-profile', 'App\Controllers\User\AccountController@postProfile');

$router->get('/logout', 'App\Controllers\HomeController@logout');

$router->execute();
