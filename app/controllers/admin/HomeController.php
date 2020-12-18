<?php
namespace App\Controllers\Admin;
use Core\Controller;

use App\Models\User;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Job;
class HomeController extends Controller{
    public function index(){
        $user = new User();
        $company = new Company();
        $job = new Job();

        $countUser = count($user->where('role',1)->get());
        $countCompany = count($company->get());
        $countJob = count($job->get());

        return $this->view('admin.home',compact('countUser', 'countCompany', 'countJob'));
    }
}