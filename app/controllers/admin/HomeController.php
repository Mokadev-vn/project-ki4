<?php
namespace App\Controllers\Admin;
use Core\Controller;

use App\Models\User;
use App\Models\Company;
use App\Models\Payment;
use App\Models\Job;
use App\Models\History;
class HomeController extends Controller{
    public function index(){
        $user = new User();
        $job = new Job();
        $company = new Company();
        $history = new History();

        $countUser = count($user->where('role',1)->get());
        $countCompany = count($company->get());
        $countJob = count($job->get());

        $getCompany = $company->params(['sum(coin) as sum'])->getOne();
        $getHistory = $history->params(['sum(coin) as sum'])->getOne();

        return $this->view('admin.home',compact('countUser', 'countCompany', 'countJob', 'getCompany','getHistory'));
    }

    public function user(){
        $user = new User();
        $listUser = $user->where('role',1)->get();
        return $this->view('admin.user', compact('listUser'));
    }

    public function deleteUser(){
        $idUser = request('idUser');

        if (!$idUser) {
            return $this->view('errors.404');
        }

        $user = new User();
        $getUser = $user->where('id', $idUser)->getOne();

        if (!$getUser) {
            return $this->view('errors.404');
        }
        $user->where('id', $idUser)->delete();
        echo json_encode(['success' => 'Delete success!']);
        return;
    }

    public function company(){
        $company = new Company();
        $listCompany = $company->get();
        return $this->view('admin.company', compact('listCompany'));

    }

    public function deleteCompany(){
        $idUser = request('idUser');

        if (!$idUser) {
            return $this->view('errors.404');
        }

        $company = new Company();
        $getCompany = $company->where('id', $idUser)->getOne();

        if (!$getCompany) {
            return $this->view('errors.404');
        }

        $company->where('id', $idUser)->delete();
        echo json_encode(['success' => 'Delete success!']);
        return;
    }

    public function job(){
        $job = new Job();
        $listJob = $job->get();

        return $this->view('admin.job',compact('listJob'));
    }

    public function deleteJob(){
        $idJob = request('idJob');

        if (!$idJob) {
            return $this->view('errors.404');
        }

        $job = new Job();
        $getJob = $job->where('id', $idJob)->getOne();

        if (!$getJob) {
            return $this->view('errors.404');
        }

        $job->where('id', $idJob)->delete();
        echo json_encode(['success' => 'Delete success!']);
        return;
    }
}