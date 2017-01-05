<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-15
 * Time: 14:26
 */

namespace Product\Controller;
use Think\Controller;
header('ContentType:text/html;charset=utf8');

class EbayCrawerController extends Controller
{
    public function index(){
        $this->display('ebayCrawer');
    }

}