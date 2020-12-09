<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use App\Models\Job;
use App\Models\Company;

class HomeController extends Controller
{

    public function index(){   
        // $company = new Company();
        
        // $listcompany = $company->get();


        // $job = new Job();
        
        // $listjob = $job->limit(5)->get();
        
        // return $this->view('home', ['jobs' => $listjob,'companys' => $listcompany] );
        return $this->view('home');
    }

    public function login()
    {
        $result = [
            'status' => 'error',
            'message' => '',
            'error' => false
        ];

        $csrf_token = request('csrf_token');
        $username = request('username');
        $password = request('password');

        if (!csrf_verify($csrf_token)) {
            $result['message'] = 'Có lỗi xảy ra!';
            echo json_encode($result);
            return;
        }

        if (!$username) {
            $result['error']['loginEmail'] = 'Bạn chưa nhập trường này!';
        }

        if (!$password) {
            $result['error']['loginPassword'] = 'Bạn chưa nhập trường này!';
        }

        if ($result['error']) {
            echo json_encode($result);
            return;
        }

        $user = new User();
        //$data = $user->where('username', strtolower($username))->where('email', $username, '=', 'OR')->getOne();
        $data = $user->where('email', $username)->getOne();

        $data = (is_array($data)) ? $data : [];

        if (count($data) != 0) {
            if (password_verify($password, $data['password'])) {
                $infoUser = [
                    'id'        => $data['id'],
                    'fullname'  => $data['fullname'], 
                    'avatar'    => $data['avatar'],
                    'role'      => $data['role'],
                    'email'     => $data['email'],
                ];
                setSession('user', $infoUser);

                $result['status'] = 'success';
                $result['message'] = 'Đăng Nhập Thành Công!';
                $result['role'] = $data['role'];
                echo json_encode($result);
                return;
            }
        }

        $company = new Company();
        $data = $company->where('email', $username)->getOne();
        $data = (is_array($data)) ? $data : [];

        if (count($data) != 0) {
            if (password_verify($password, $data['password'])) {
                $infoUser = [
                    'id'        => $data['id'],
                    'fullname'  => $data['name'], 
                    'avatar'    => $data['avatar'],
                    'role'      => 2,
                    'email'     => $data['email'],
                ];
                setSession('user', $infoUser);

                $result['status'] = 'success';
                $result['message'] = 'Đăng Nhập Thành Công!';
                $result['role'] = 2;
                echo json_encode($result);
                return;
            }
        }

        $result['message'] = 'Thông tin tài khoản mật khẩu không chính xác!';
        echo json_encode($result);
        return;
    }

    public function register()
    {
        $result = [
            'status' => 'error',
            'message' => '',
            'error' => false
        ];

        $csrf_token = request('csrf_token');
        $fullname = request('fullname');
        $phone = request('phone');
        $email = request('email');
        $role = (request('role') === '') ? 1 : request('role');
        $password = request('password');

        if (!csrf_verify($csrf_token)) {
            $result['message'] = 'Có lỗi xảy ra!';
            echo json_encode($result);
            return;
        }

        if (!$fullname) {
            $result['error']['fullname'] = 'Bạn chưa nhập trường này!';
        }
        if (!$phone) {
            $result['error']['phone'] = 'Bạn chưa nhập trường này!';
        }

        if (!$email) {
            $result['error']['email'] = 'Bạn chưa nhập trường này!';
        }
        if (!$password) {
            $result['error']['password'] = 'Bạn chưa nhập trường này!';
        }


        if ($result['error']) {
            echo json_encode($result);
            return;
        }

        $password = password_hash($password, PASSWORD_BCRYPT);

        if($role == 1){
            $user = new User();
            $user->fullname = $fullname;
            $user->email = $email;
            $user->password = $password;
            $user->role = $role;
            $user->phone = $phone;
    
            if ($user->save()) {
                $result['status'] = 'success';
                $result['message'] = 'Đăng Kí Thành Công!';
                echo json_encode($result);
                return;
            }
        }

        if($role == 2){
            $company = new Company();
            $company->name = $fullname;
            $company->email = $email;
            $company->password = $password;
            $company->phone = $phone;

            if($company->save()){
                $result['status'] = 'success';
                $result['message'] = 'Đăng Kí Thành Công!';
                echo json_encode($result);
                return;
            }
        }

        $result['message'] = 'Có lỗi xảy ra vui lòng thử lại!';
        echo json_encode($result);
        return;

    }

    public function logout()
    {
        if (destroySession('user')) {
            redirect('');
        }
    }


}
