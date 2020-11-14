<?php

use Core\Router;
use Core\App;


$router = new Router();

//home
$router->get('/', 'App\Controllers\HomeController@index');


$router->execute();
