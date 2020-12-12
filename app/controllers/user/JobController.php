<?php
namespace App\Controllers\User;
use Core\Controller;

use App\Models\User;
use App\Models\Job;
use App\Models\Application;

class JobController extends Controller{

    public function application($id){
        $userId = getSession('user')['id'];
        $job = new Job();
        $application = new Application();
        $getJob = $job->where('id', $id)->getOne();

        if(!$getJob){
            echo json_encode(['error'=>'Job not found']);
            return;
        }

        $check = $application->where('user_id', $userId)->where('job_id', $id)->getOne();
        if($check){
            echo json_encode(['error'=>'You have applied!']);
            return;
        }

        $application->user_id = $userId;
        $application->job_id = $id;
        $application->create_at = now();
        if($application->save()){ 
            echo json_encode(['success' => 'Application successfully!']);
            return;
        }
        echo json_encode(['error' => 'Error!']);
    }


}