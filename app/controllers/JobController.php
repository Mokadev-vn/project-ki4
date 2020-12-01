<?php
namespace App\Controllers;
use Core\Controller;

class JobController extends Controller{
    public function index(){
        return $this->view('job');
    }
}