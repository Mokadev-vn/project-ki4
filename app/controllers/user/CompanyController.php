<?php
namespace App\Controllers\User;
use Core\Controller;
use App\Models\User;

class CompanyController extends Controller{

    public function profile(){
        return $this->view('user.profile-company');
    }



}