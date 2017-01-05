<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-15
 * Time: 14:40
 */

namespace Purchase\Controller;
use Think\Controller;
header('ContentType:text/html;charset=utf8');
class OutOfStockMarkController extends Controller
{
    public function index(){
        $this->display('outOfStockMark');
    }

}