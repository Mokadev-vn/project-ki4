<?php

use Core\Middleware;

Middleware::$middleware = [
    'checkLogin' => 'App\Middleware\CheckLogin',
    'falseLogin' => 'App\Middleware\FalseLogin',
    'AuthAdmin'  => 'App\Middleware\AuthAdmin',
    'User'       => 'App\Middleware\User',
    'Company'    => 'App\Middleware\Company',
];
