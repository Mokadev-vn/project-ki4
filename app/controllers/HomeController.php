<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use App\Models\Job;
use App\Models\Company;

class HomeController extends Controller
{

    // thìn 
    public function index(){   
        $company = new Company();
        
        $listCompany = $company->limit(8)->get();
        $job = new Job();
        
        $listJob = $job->params(['j.*, c.name as name_company, c.avatar as avatar'])->join('companys c', 'c.id = j.company_id', 'LEFT')->limit(5)->orderBy('id')->get();
        
        return $this->view('home', compact('listJob', 'listCompany'));

    }
    // phát
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
    //phat
    public function register()
    {

        $user = new User();
        $company = new Company();

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

        $checkUserEmail = $user->where('email',$email)->get();
        $checkCompanyEmail = $company->where('email',$email)->get();

        if(count($checkUserEmail) > 0|| count($checkCompanyEmail) > 0){
            $result['error']['email'] = 'Email đã tồn tại!';
        }

        if ($result['error']) {
            echo json_encode($result);
            return;
        }

        $password = password_hash($password, PASSWORD_BCRYPT);

        
        if($role == 1){
            
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
            
            $company->name = $fullname;
            $company->slug = slug($fullname,'companys');
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

    //phat
    public function logout()
    {
        if (destroySession('user')) {
            redirect('');
        }
    }

    // thìn 
    public function viewJob($slug){
        $job = new Job();
        $company = new Company();
        $infoJob = $job->where('slug', $slug)->getOne();
        if(!$infoJob){
            return $this->view('errors.404');
        }

        $infoCompany = $company->params(['name', 'email', 'phone', 'website', 'avatar','full_address'])->where('id', $infoJob['company_id'])->getOne();
        $listJob = $job->params(['j.*', 'c.avatar as avatar', 'c.name as name_company'])->join('companys c', 'c.id = j.company_id')->where('deadline', now(), '>')->where('active',1)->limit(5)->get();

        return $this->view('view-job',compact('infoJob','infoCompany','listJob'));
    }

    //thìn
    public function search(){
        $keywords = request('keywords');
        $local = request('local');
        $job = new Job();
        $listJob = $job->query("SELECT j.*, c.avatar as avatar, c.name as name_company FROM jobs j join companys c on c.id = j.company_id WHERE j.title like ? AND j.city = ?", ["%$keywords%", $local]);

        return $this->view('search',compact('listJob'));
    }

}
