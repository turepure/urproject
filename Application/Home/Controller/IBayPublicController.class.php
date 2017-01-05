<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-15
 * Time: 11:20
 */

namespace Home\Controller;
use Think\Controller;
header('ContentType:text/html;charset=utf-8');

class IBayPublicController extends ParentController
{
    public function __construct($check=true){
        parent::__construct($check);
    }

    public function index(){
        $this->display('ibaypublic');

    }

}