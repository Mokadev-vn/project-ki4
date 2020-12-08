<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Job;
class JobController extends Controller{
    public function index(){
        $job = new Job();

        return $this->view('job');
    }
}