<?php

namespace App\Controllers\User;

use Core\Controller;
use App\Models\CV;
use App\Models\User;
use App\Models\Job;
use App\Models\Application;
use App\Models\Company;

class AccountController extends Controller
{

    //duy 
    public function index()
    {
        $id = getSession('user')['id'];
        $role = getSession('user')['role'];
        if ($role == 1) {
            $application = new Application();
            $listAp = $application->params(['j.*', 'a.id as id_app'])->join('jobs j', 'j.id = a.job_id')->where('user_id', $id)->limit(8)->get();
            $countAp = count($application->where('user_id', $id)->get());
            return $this->view('user.dashboard', compact('countAp', 'listAp'));
        }

        if ($role == 2) {
            $job = new Job();
            $application = new Application();

            $headJob = $job->params(['count(id) as job_total', 'count(if(active = 1,1,null)) as active_total'])->where('company_id', $id)->getOne();
            $apply   = $application->params(['count(a.id) as total'])->join('jobs j', 'j.id = a.job_id')->where('j.company_id', $id)->getOne();

            $listResumes = $application->params(['u.*', 'cv.file as file', 'a.id as apply_id', 'a.pay as pay', 'u.fullname as name', 'u.avatar as avatar', 'j.title as title'])->join('users u', 'u.id = a.user_id')->join('jobs j', 'a.job_id = j.id')->join('cvs cv', 'cv.user_id = u.id')->where('j.company_id', $id)->orderBy('a.id')->get();

            return $this->view('user.dashboard', compact('headJob', 'apply','listResumes'));
        }
        return $this->view('error.404');
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

        if (!$fullName) {
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
        $listCv = $cv->where('user_id', $id)->get();
        return $this->view('user.cv-manager', compact('listCv', 'error'));
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

        if (!$name) {
            $result['error']['name'] = 'Vui lòng đặt tên CV!';
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

        if ($cv->save()) {
            $result['status'] = 'success';
            $result['message'] = 'Up CV successfully';
            setSession('error', $result);
            redirect('cv-manager');
            return;
        }
    }

    public function deleteCV()
    {
        $idCv = request('idCV');
        $id = getSession('user')['id'];
        if (!$idCv) {
            return $this->view('errors.404');
        }

        $cv = new CV();
        $getCV = $cv->where('id', $idCv)->where('user_id', $id, 'AND')->getOne();

        if (!$getCV) {
            return $this->view('errors.404');
        }

        $cv->where('id', $idCv)->delete();

        echo json_encode(['success' => 'Delete success!']);
        return;
    }

    public function applied()
    {
        $id = getSession('user')['id'];
        $job = new Job();

        $listApp = $job->params(['j.*', 'a.id as id_ap', 'c.avatar as avatar', 'c.name as company_name'])->join('applications a', 'a.job_id = j.id')->join('companys c', 'c.id = j.company_id')->where('a.user_id', $id)->get();

        return $this->view('user.applied', compact('listApp'));
    }

    public function deleteApplied()
    {
        $idAp = request('idAp');
        $id = getSession('user')['id'];

        if (!$idAp) {
            return $this->view('errors.404');
        }

        $application = new Application();
        $getAp = $application->where('id', $idAp)->where('user_id', $id)->getOne();

        if (!$getAp) {
            return $this->view('errors.404');
        }
        $application->where('id', $idAp)->delete();
        echo json_encode(['success' => 'Delete success!']);
        return;
    }

    public function changePassword()
    {
        $error = getSession('error');
        destroySession('error');

        return $this->view('user.change-password', compact('error'));
    }

    public function postChangePassword()
    {
        $id = getSession('user')['id'];
        $role = getSession('user')['role'];

        $users = new User();
        $company = new Company();

        $user = ($role == 1) ? $users : $company;

        $result = [
            'status' => 'error',
            'message' => '',
            'error' => false
        ];

        $csrf_token = request('csrf_token');
        $password = request('password');
        $oldPassword = request('oldPassword');
        $cfPassword = request('cfPassword');

        if (!csrf_verify($csrf_token)) {
            $result['message'] = 'Có lỗi xảy ra!';
            setSession('error', $result);
            back();
            return;
        }

        if (!$password) {
            $result['error']['new'] = 'Vui lòng nhập password mới';
        }

        if (!$oldPassword) {
            $result['error']['old'] = 'Vui lòng nhập password cũ';
        }

        if ($password != $cfPassword) {
            $result['error']['confirm'] = 'Không trùng password';
        }


        if ($result['error']) {
            setSession('error', $result);
            back();
            return;
        }


        $get = $user->where('id', $id)->getOne();

        if (!password_verify($oldPassword, $get['password'])) {
            $result['message'] = "Password cũ không chính xác !";
            setSession('error', $result);
            back();
            return;
        }

        $password = password_hash($password, PASSWORD_BCRYPT);

        $user->password = $password;
        $user->where('id', $id)->update();

        $result['status'] = 'success';
        $result['message'] = "UPDATE password successfully";
        setSession('error', $result);
        redirect('change-password');
        return;
    }
}
