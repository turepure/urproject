<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends ParentController {
    public function __construct($check=true){
        parent::__construct($check);
    }

    //主方法
    public function index(){
        redirect('/home/users/login');
    }

    /* 登陆页面
    *
    */
    public function home(){
        $role =session('role');
        $username = session('session_name');
        $this->assign('username',$username);
        $this->assign('role',$role);
//        $this->render('管理中心');
        $this->display('home');
    }

}