<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-15
 * Time: 14:17
 */

namespace Product\Controller;
use Think\Controller;
header('ContentType:test/html;charset=utf8');

class CategoryAnalysisController extends Controller
{
    public function index(){
        $this->display('categoryAnalysis');
    }


}