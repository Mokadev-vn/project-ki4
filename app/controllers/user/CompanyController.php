<?php

namespace App\Controllers\User;

use Core\Controller;
use App\Models\User;
use App\Models\Company;
use App\Models\Application;
use App\Models\Job;

class CompanyController extends Controller
{

    public function profile()
    {
        return $this->view('user.profile-company');
    }

    public function postProfile()
    {
    }


    public function newJob()
    {
        return $this->view('user.post-job');
    }

    public function postJob()
    {
        $id = getSession('user')['id'];
        $user = new User();

        $result = [
            'status' => 'error',
            'message' => '',
            'error' => false
        ];

        $csrf_token = request('csrf_token');
        $title = request('title');
        $description = request('description');
        $deadline = request('deadline');
        $type = request('type');
        $skills = request('skills');
        $salaryMin = request('salaryMin');
        $salaryMax = request('salaryMax');
        $experience = request('experience');
        $gender = request('gender');
        $city = request('city');
        $address = request('address');

        if (!csrf_verify($csrf_token)) {
            $result['message'] = 'Có lỗi xảy ra!';
            setSession('error', $result);
            back();
            return;
        }

        if ($title == '') {
            $result['error']['title'] = 'False';
        }


        if ($result['error']) {
            setSession('error', $result);
            back();
            return;
        }

        $job = new Job();
        $job->title        = $title;
        $job->description  = $description;
        $job->type         = $type;
        $job->deadline     = $deadline;
        $job->active       = 0;
        $job->salary_max   = $salaryMax;
        $job->salary_min   = $salaryMin;
        $job->experience   = $experience;
        $job->gender       = $gender;
        $job->city         = $city;
        $job->full_address = $address;
        $job->slug         = slug($title, 'jobs');
        $job->company_id   = $id;
        $job->create_at    = now();

        if ($job->save()) {
            $result['status'] = 'success';
            $result['message'] = 'Đăng Kí Thành Công!';
            setSession('success', $result);
            redirect('new-job');
            return;
        }
    }

    public function manageJob()
    {
        $id = getSession('user')['id'];
        $job = new Job();
        $listJob = $job->params(['j.*','count(a.id) as total'])->join('applications a', 'a.job_id = j.id','LEFT')->where('j.company_id', $id)->groupBy('j.id')->orderBy('j.id')->get();
        $headJob = $job->params(['count(j.id) as total_job','count(a.id) as total_app', 'count(if(j.active = 1,1,null)) total_active'])->join('applications a', 'a.job_id = j.id', 'LEFT')->where('j.company_id', $id)->getOne();
        return $this->view('user.manage-job',compact('listJob','headJob'));
    }
    
    public function listResumes(){
        $id = getSession('user')['id'];
        $application = new Application();
        $listResumes = $application->params(['u.*','cv.file as file', 'u.fullname as name', 'u.avatar as avatar'])->join('users u','u.id = a.user_id')->join('jobs j','a.job_id = j.id')->join('cvs cv','cv.user_id = u.id')->where('j.company_id',$id)->get();

        return $this->view('user.list-resumes',compact('listResumes'));
    }
}
