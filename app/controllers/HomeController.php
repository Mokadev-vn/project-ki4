<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
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
        $data = $user->where('username', strtolower($username))->where('email', $username, '=', 'OR')->getOne();
        $data = (is_array($data)) ? $data : [];

        if (count($data) != 0) {
            if (password_verify($password, $data['password'])) {
                $infoUser = [
                    'id'        => $data['id'],
                    'username'  => $data['username'],
                    'role'      => $data['role'],
                    'email'     => $data['email'],
                    'full_name' => $data['full_name'],
                    'image'     => $data['image'],
                ];
                setSession('user', $infoUser);

                $result['status'] = 'success';
                $result['message'] = 'Đăng Nhập Thành Công!';
                $result['role'] = $data['role'];
                echo json_encode($result);
                return;
            }
        }
        $result['message'] = 'Thông tin tài khoản mật khẩu không chính xác!';
        echo json_encode($result);
        return;
    }

    public function register() {
        $result = [
            'status' => 'error',
            'message' => '',
            'error' => false
        ];

        $csrf_token = request('csrf_token');
    }
}
