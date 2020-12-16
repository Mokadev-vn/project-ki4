<?php

namespace App\Controllers\User;

use Core\Controller;
use App\Models\CV;
use App\Models\User;
use App\Models\Job;

class AccountController extends Controller
{

    public function index()
    {
        return $this->view('user.dashboard');
    }
    
    public function profile()
    {
        $id = getSession('user')['id'];
        $error = getSession('error');
        destroySession('error');

        $user = new User();
        $infoUser = $user->where('id', $id)->getOne();
        return $this->view('user.profile', compact('infoUser'));
    }

    public function postProfile()
    {
        $id = getSession('user')['id'];
        $user = new User();

        $result = [
            'status' => 'error',
            'message' => '',
            'error' => false
        ];

        $csrf_token = request('csrf_token');
        $fullName = request('fullname');
        $phone = request('phone');
        $email = request('email');
        $description = request('description');
        $facebook = request('facebook');
        $twitter = request('twitter');
        $linkedin = request('linkedin');
        $address = request('address');
        $avatar = (fileRequest('avatar')['name'] != '') ? fileRequest('avatar') : false;

        if(!$fullName){
            $result['error']['full_name'] = 'Bạn chưa nhập trường này!';
        }

        if (!preg_match("/^[a-z][a-z0-9_\.]{1,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/", $email)) {
            $result['error']['email'] = 'Vui lòng nhập đúng định dạng mail';
        }

        if (!csrf_verify($csrf_token)) {
            $result['message'] = 'Có lỗi xảy ra!';
            setSession('error', $result);
            redirect('user-profile');
            return;
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
        $check = $user->where('email', $email)->where('email', $emailUser, '<>')->getOne();

        if ($check) {
            $result['error']['email'] = 'Email đã tồn tại vui lòng nhập mail khác!';
        }

        if ($result['error']) {
            setSession('error', $result);
            redirect('user-profile');
            return;
        }

        $user->where('id', $id);
        $user->fullname = $fullName;
        $user->email = $email;
        $user->phone = $phone;
        $user->description = $description;
        $user->facebook = $facebook;
        $user->twitter = $twitter;
        $user->linkedin = $linkedin;
        $user->address = $address;
        if (isset($imageUpload)) $user->avatar = $imageUpload;

        if ($user->update()) {
            $result['status'] = 'success';
            $result['message'] = 'Update thành công!';
            setSession('success', $result);
            redirect('user-profile');
            return;
        }
    }

    public function CvManager()
    {
        $id = getSession('user')['id'];
        $error = getSession('error');
        destroySession('error');
        $cv = new CV();
        $listCv = $cv->where('user_id',$id)->get();
        return $this->view('user.cv-manager', compact('listCv','error'));
    }

    public function postCV()
    {
        $id = getSession('user')['id'];
        

        $cv = new CV();
        
        $result = [
            'status' => 'error',
            'message' => '',
            'error' => false
        ];

        $csrf_token = request('csrf_token');
        $name = request('name');
        $file = fileRequest('file');


        if (!csrf_verify($csrf_token)) {
            $result['message'] = 'Có lỗi xảy ra!';
            setSession('error', $result);
            back();
            return;
        }

        $typeImage = ["application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/pdf", "application/msword"];

        $imageUpload = uploadFile($file, $typeImage);

        if (!$imageUpload) {
            $result['error']['image'] = 'File sai định dạng!';
        } else if ($imageUpload == 'size') {
            $result['error']['image'] = 'File quá giới hạn kích thước 1,5MB!';
        }

        if ($result['error']) {
            setSession('error', $result);
            back();
            return;
        }

        $cv->user_id = $id;
        $cv->file = $imageUpload;
        $cv->name = $name;
        $cv->create_at = now();

        if($cv->save()){
            echo "save";
        }
        
    }

    public function applied(){
        $id = getSession('user')['id'];
        $job = new Job();
        
        $listApp = $job->params(['j.*', 'c.avatar as avatar', 'c.name as company_name'])->join('applications a', 'a.job_id = j.id')->join('companys c', 'c.id = j.company_id')->where('a.user_id',$id)->get();

        return $this->view('user.applied', compact('listApp'));
    }

    public function changePassword(){
        $id = getSession('user')['id'];
        $user = new User();

        return $this->view('user.change-password');
    }
}
