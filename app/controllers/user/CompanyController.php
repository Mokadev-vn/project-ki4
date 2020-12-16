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
        $id = getSession('user')['id'];
        $error = getSession('error');

        destroySession('error');
        $company = new Company();
        $infoCompany = $company->where('id', $id)->getOne();
        return $this->view('user.profile-company', compact('infoCompany', 'error'));
    }

    public function postProfile()
    {
        $id = getSession('user')['id'];
        $company = new Company();

        $result = [
            'status' => 'error',
            'message' => '',
            'error' => false
        ];

        $csrf_token = request('csrf_token');
        $name = request('name');
        $phone = request('phone');
        $email = request('email');
        $about = request('about');
        $website = request('website');
        $city   = request('city');
        $address = request('address');
        $avatar = (isset(fileRequest('avatar')['name']) && fileRequest('avatar')['name']!= '') ? fileRequest('avatar') : false;

        if (!csrf_verify($csrf_token)) {
            $result['message'] = 'Có lỗi xảy ra!';
            setSession('error', $result);
            redirect('company-profile');
            return;
        }
        
        if(!$name){
            $result['error']['name'] = 'Bạn chưa nhập trường này!';
        }

        if (!preg_match("/^[a-z][a-z0-9_\.]{1,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/", $email)) {
            $result['error']['email'] = 'Vui lòng nhập đúng định dạng mail';
        }

        if ($avatar) {
            $typeImage = ["image/png", "image/jpeg", "image/gif", "image/jpg"];

            $imageUpload = uploadFile($avatar, $typeImage);

            if (!$imageUpload) {
                $result['error']['image'] = 'File sai định dạng!';
            } else if ($imageUpload == 'size') {
                $result['error']['image'] = 'File quá giới hạn kích thước 1,5MB!';
            }
        }

        $emailUser = getSession('user')['email'];
        $check = $company->where('email', $email)->where('email', $emailUser, '<>')->getOne();

        if ($check) {
            $result['error']['email'] = 'Email đã tồn tại vui lòng nhập mail khác!';
        }

        if ($result['error']) {
            setSession('error', $result);
            back();
            return;
        }

        $company->where('id', $id);
        $company->name = $name;
        $company->email = $email;
        $company->phone = $phone;
        $company->website = $website;
        $company->about = $about;
        $company->city = $city;
        $company->full_address = $address;

        if (isset($imageUpload)) $company->avatar = $imageUpload;

        if ($company->update()) {
            $result['status'] = 'success';
            $result['message'] = 'Update success!';
            setSession('error', $result);
            redirect('company-profile');
            return;
        }

    }


    public function newJob()
    {
        $id = getSession('user')['id'];
        $error = getSession('error');
        destroySession('error');
       
        $job = new Job();
        $listJob = $job->params(['j.*','count(a.id) as total'])->join('applications a', 'a.job_id = j.id','LEFT')->where('j.company_id', $id)->groupBy('j.id')->orderBy('j.id')->get();
        $headJob = $job->params(['count(j.id) as total_job','count(a.id) as total_app', 'count(if(j.active = 1,1,null)) total_active'])->join('applications a', 'a.job_id = j.id', 'LEFT')->where('j.company_id', $id)->getOne();

        return $this->view('user.post-job', compact('error','headJob'));
    }

    public function postJob()
    {
        $id = getSession('user')['id'];
        $job = new Job();

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

        if (!$title) {
            $result['error']['title'] = 'Error.....';
        }

        if(!$deadline){
            $result['error']['deadline'] = 'Select deadline!';
        }


        if ($result['error']) {
            setSession('error', $result);
            back();
            return;
        }

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
            $result['message'] = 'Post Success!';
            setSession('error', $result);
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
        $listResumes = $application->params(['u.*','cv.file as file', 'u.fullname as name', 'u.avatar as avatar', 'j.title as title'])->join('users u','u.id = a.user_id')->join('jobs j','a.job_id = j.id')->join('cvs cv','cv.user_id = u.id')->where('j.company_id',$id)->get();

        return $this->view('user.list-resumes',compact('listResumes'));
    }


    public function wallet(){
        $id = getSession('user')['id'];
        $error = getSession('error');
        destroySession('error');
        
        $company = new Company();
        $info = $company->params(['coin'])->where('id', $id)->getOne();

        return $this->view('user.wallet', compact('info', 'error'));
    }
}
