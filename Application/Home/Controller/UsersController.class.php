<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-10
 * Time: 11:19
 */
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class UsersController extends ParentController {

    public function __construct($check=true){
        parent::__construct($check);
    }

    /*相对路径 跳转到登陆页面*/
    public function index()
    {
        redirect('./login');
    }

    /* 渲染登陆页面
     * 其中包含注册页面
     */
    public function login()
    {
        $this->render('用户登陆');
        $this->display('Index:login');
    }


    /* 执行登陆功能
     * 获取post传值->验证验证码->确认用户存在->检测密码是否相符->执行登陆或返回失败
     */
    public function do_login()
    {
        $postdata['username']=$_POST['username'];
        $postdata['password']=$_POST['password'];
        $postdata['vcode']=I('post.vcode');
//        var_dump($_POST);die;


        $check=$this->check_verify($postdata['vcode']);
//         var_dump($check);

        if($check){
            $Model=M('user');
//            $where=array('username' => $postdata['uername']);
            $is_registered=$Model->where('uername="'.$postdata['username'].'"')->find();
            // var_dump($is_registered);
            if(!empty($is_registered)){
                if($is_registered['password']==md5($postdata['password']))
                    // {echo "登陆成功";}else{echo "密码有误";}
                {   session('session_name',$is_registered['uername']);
//                    redirect('/home/index/home');
                    $return['status']="OK";
                    $return['msg']="登陆成功";
                    $return['id']=$is_registered['id'];
                }else{
                    $return['status']="NO";
                    $return['msg']="密码有误";
                }
            }else{
                $return['status']="NO";
                $return['msg']="用户不存在";
            }

        }else{
            $return['status']="NO";
            $return['msg']='验证码有误';
        }


        echo  json_encode($return);
    }


    /* 执行注销功能
     * 销毁用户session->跳转到登陆页面
     */
    public function logout(){
        session('session_name',null);
        redirect('/home/users/login');
    }




    /*执行用户注册功能*/
    public function do_register(){

    }




}
