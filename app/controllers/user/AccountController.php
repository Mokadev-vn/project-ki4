<?php
namespace App\Controllers\User;
use Core\Controller;

use App\Models\User;
class AccountController extends Controller{
    
    public function index(){
        return $this->view('user.dashboard');
    }
    public function profile(){
        $id = getSession('user')['id'];
        $user = new User();
        $infoUser = $user->where('id', $id)->getOne();
        return $this->view('user.profile', compact('infoUser'));
    }
    public function postProfile(){
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
        $avatar = (fileRequest('avatar')['name'] != '') ? fileRequest('avatar') : false ;

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
            }else if ($imageUpload == 'size') {
                $result['error']['image'] = 'File quá giới hạn kích thước 1,5MB!';
            }
        }

        $emailUser = getSession('user')['email'];
        $check = $user->where('email', $email)->where('email', $emailUser, '<>')->getOne();

        if ($check) {
            $result['error']['email'] = 'Email đã tồn tại vui lòng nhập mail khác!';
        }

        if($result['error']){
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

        if($user->update()){
            $result['status'] = 'success';
            $result['message'] = 'Update thành công!';
            setSession('success', $result);
            redirect('user-profile');
            return;
        }

    }
 
}