<?php
use Core\DB;

DB::$config = [
    'type' => 'mysql',
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname' => 'project',
    'port' => 3306,
    'prefix' => '',
    'charset' => 'utf8'
];
