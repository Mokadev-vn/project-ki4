<?php
namespace App\Controllers;
use Core\Controller;
use App\Models\Job;
class JobController extends Controller{
    // thìn
    public function index(){
        $job = new Job();
        $listJob = $job->params(['j.*, c.name as name_company, c.avatar as avatar'])->join('companys c', 'c.id = j.company_id', 'LEFT')->limit(9)->orderBy('id')->get();
        return $this->view('list-job',compact('listJob'));
    }
}