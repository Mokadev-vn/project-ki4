<?php
namespace App\Middleware;
use Core\App;

class User{
    public function handle()
    {
        if (!App::getSession('user') && App::getSession('user')['role'] != 1) {
            App::redirect('');
            return false;
        }
        return true;
    }
}