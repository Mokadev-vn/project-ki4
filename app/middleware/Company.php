<?php
namespace App\Middleware;
use Core\App;

class Company{
    public function handle()
    {
        if (!App::getSession('user') || App::getSession('user')['role'] != 2) {
            App::redirect('');
            return false;
        }
        return true;
    }
}