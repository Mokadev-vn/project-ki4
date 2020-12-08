<?php
namespace App\Controllers\User;
use Core\Controller;

use App\Models\User;
class AccountController extends Controller{

    public function index(){
        return $this->view('user.dashboard');
    }



}