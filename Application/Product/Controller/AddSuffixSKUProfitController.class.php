<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-15
 * Time: 11:43
 */

namespace Product\Controller;
use Think\Controller;
header('ContentType:text/html;charset=utf8');
class AddSuffixSKUProfitController extends Controller
{

    public  function index(){
        $this->display('addSuffixSKUProfit');
    }

}