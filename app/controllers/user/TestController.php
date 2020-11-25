<?php
namespace App\Controllers\User;
use Core\Controller;

use App\Models\User;
class TestController extends Controller{

    public function index(){

        return $this->view('page.hello',['data'=>'asdfasdfasd']);
    }


    public function indexPost(){
        $id = request('name');
        $users = new User();
        $users->where('id',$id);
        $users->delete();

    }



}