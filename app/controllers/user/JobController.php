<?php
namespace App\Controllers\User;
use Core\Controller;

use App\Models\User;
use App\Models\Job;
use App\Models\Application;
use App\Models\Company;
use App\Models\CV;

class JobController extends Controller{

    public function application($id){
        $userId = getSession('user')['id'];

        $job = new Job();
        $application = new Application();
        $Cv = new CV();

        $getJob = $job->where('id', $id)->getOne();

        if(!$getJob){
            echo json_encode(['error'=>'Job not found']);
            return;
        }

        $getCV = $Cv->where('user_id', $userId)->getOne();

        if(!$getCV){
            echo json_encode(['error'=>'Please upload your cv to the system!']);
            return;
        }

        $check = $application->where('user_id', $userId)->where('job_id', $id)->getOne();
        if($check){
            echo json_encode(['error'=>'You have applied!']);
            return;
        }

        $application->user_id = $userId;
        $application->job_id = $id;
        $application->cv_id = $getCV['id'];
        $application->create_at = now();
        $application->pay = 0;

        if($application->save()){
            $company = new Company();
            $infoCompany = $company->params(['c.email as email','c.name as name'])->join('jobs j', 'j.company_id = c.id')->where('j.id', $id)->getOne();
            sendMail($infoCompany['email'], $infoCompany['name'], 'There is 1 new candidate','New candidates apply to your work.');
            echo json_encode(['success' => 'Application successfully!']);
            return;
        }
        echo json_encode(['error' => 'Error!']);
    }


}