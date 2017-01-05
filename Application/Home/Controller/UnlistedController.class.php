<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-15
 * Time: 11:35
 */

namespace Home\Controller;


class UnlistedController extends ParentController
{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->display('unlisted');
    }


}