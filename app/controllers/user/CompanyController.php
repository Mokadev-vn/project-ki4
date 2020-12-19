<?php

namespace App\Controllers\User;

use Core\Controller;
use App\Models\CV;
use App\Models\Company;
use App\Models\Application;
use App\Models\Job;
use App\Models\Payment;
use App\Models\History;

// Huy 
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
        $application = new Application();

        // $listJob = $job->params(['j.*','count(a.id) as total'])->join('applications a', 'a.job_id = j.id','LEFT')->where('j.company_id', $id)->groupBy('j.id')->orderBy('j.id')->get();
        $headJob = $job->params(['count(id) as job_total', 'count(if(active = 1,1,null)) as active_total'])->where('company_id', $id)->getOne();
        $apply   = $application->params(['count(a.id) as total'])->join('jobs j','j.id = a.job_id')->where('j.company_id', $id)->getOne();
        return $this->view('user.post-job', compact('error','headJob','apply'));
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
        $application = new Application();
        $listJob = $job->params(['j.*','count(a.id) as total'])->join('applications a', 'a.job_id = j.id','LEFT')->where('j.company_id', $id)->groupBy('j.id')->orderBy('j.id')->get();

        $headJob = $job->params(['count(id) as job_total', 'count(if(active = 1,1,null)) as active_total'])->where('company_id', $id)->getOne();
        $apply   = $application->params(['count(a.id) as total'])->join('jobs j','j.id = a.job_id')->where('j.company_id', $id)->getOne();
        return $this->view('user.manage-job',compact('listJob','headJob','apply'));
    }

    public function editJob($slug){
        $id = getSession('user')['id'];
        $error = getSession('error');
        destroySession('error');
        $job = new Job();
        $getJob = $job->where('slug',$slug)->where('company_id', $id, 'AND')->getOne();

        if(!$getJob){
            return $this->view('errors.404');
        }

        return $this->view('user.edit-job', compact('getJob','error'));
    }

    public function postEditJob($slug){
        $id = getSession('user')['id'];
        $job = new Job();
        $getJob = $job->where('slug',$slug)->where('company_id', $id, 'AND')->getOne();

        if(!$getJob){
            return $this->view('errors.404');
        }

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
        $job->salary_max   = $salaryMax;
        $job->salary_min   = $salaryMin;
        $job->experience   = $experience;
        $job->gender       = $gender;
        $job->city         = $city;
        $job->full_address = $address;
        $slugNew = ($getJob['title'] != $title) ?  slug($title, 'jobs') : $slug;
        $job->slug         = $slugNew;

        if ($job->where('id',$getJob['id'])->update()) {
            $result['status'] = 'success';
            $result['message'] = 'Update Success!';
            setSession('error', $result);
            redirect('manage-jobs/'.$slugNew);
            return;
        }

    }

    public function deleteJob(){

        $idJob = request('idJob');
        $id = getSession('user')['id'];

        if (!$idJob) {
            return $this->view('errors.404');
        }

        $job = new job();
        $getJob = $job->where('id', $idJob)->where('company_id', $id)->getOne();

        if (!$getJob) {
            return $this->view('errors.404');
        }
        $job->where('id', $idJob)->delete();
        echo json_encode(['success' => 'Delete success!']);
        return;
    
    }
    
    public function listResumes(){
        $id = getSession('user')['id'];
        $application = new Application();
        $listResumes = $application->params(['u.*','cv.file as file','a.id as apply_id','a.pay as pay', 'u.fullname as name', 'u.avatar as avatar', 'j.title as title'])->join('users u','u.id = a.user_id')->join('jobs j','a.job_id = j.id')->join('cvs cv','cv.user_id = u.id')->where('j.company_id',$id)->orderBy('a.id')->get();
        
        return $this->view('user.list-resumes',compact('listResumes'));
    }


    public function wallet(){
        $id = getSession('user')['id'];
        $error = getSession('error');
        destroySession('error');
        
        $company = new Company();

        $info = $company->params(['coin'])->where('id', $id)->getOne();
        $payment = new Payment();
        
        $listPayment = $payment->where('company_id', $id)->where('status',1)->get();

        return $this->view('user.wallet', compact('info', 'error', 'listPayment'));
    }

    public function payment(){
        $id = getSession('user')['id'];
        $idAp = request('idAp');

        if(!$idAp){
            return;
        }
        
        $application = new Application();
        $getInfo = $application->where('id',$idAp)->getOne();

        if($getInfo['pay'] == 1){
            echo json_encode(['error'=>'Error']);
            return;
        }

        $company = new Company();
        $getCompany = $company->where('id', $id)->getOne();

        if($getCompany['coin'] < 20000){
            echo json_encode(['error'=>'Your amount is not enough to make the payment.']);
            return;
        }

        $coin = $getCompany['coin'] - 20000;
        $company->coin = $coin;
        $company->where('id',$id)->update();

        $application->pay = 1;
        $application->where('id',$idAp)->update();
        
        $history = new History();

        $history->company_id = $id;
        $history->apply_id = $idAp;
        $history->coin = 20000;
        $history->message = "Payment CV ".$getInfo['cv_id'];
        $history->status = 1;
        $history->create_at = now();
        $history->save();

        $cv = new CV();
        $getCV = $cv->where('id', $getInfo['cv_id'])->getOne();

        $link = APP_CONFIG['uploads'].$getCV['file'];
        
        echo json_encode(['success'=>'Payment Successfully.', 'link'=> $link]);
            return;

    }

    public function history(){
        $id = getSession('user')['id'];
        $history = new History();
        $listHistory = $history->where('company_id', $id)->orderBy('id')->get();
        return $this->view('user.history', compact('listHistory'));
    }
}
