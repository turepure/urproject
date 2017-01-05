<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-14
 * Time: 16:45
 */

namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class EBaySalerToolsController  extends ParentController {

    public function __construct($check=true){
        parent::__construct($check);
    }

    public function index(){
//        $this->show('eBaySalerTools');
        $this->display('eBaySalerTools');
    }

}