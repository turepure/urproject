<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-19
 * Time: 9:03
 */

namespace Admin\Controller;
use Think\Controller;
header('Content-Type:text/html;charset=utf8');

class PermissionController extends Controller

{
    public function index(){
        $Permission = M('permission');
        $result = $Permission->select();
        $counter = $Permission->count();
        $this->assign('result',$result);
        $this->assign('counter',$counter);
        $this->display('admin-permission');
    }


}