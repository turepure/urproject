<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-15
 * Time: 11:43
 */

namespace Home\Controller;
use Think\Controller;
header('ContentType:text/html;charset=utf8');
class EBayAccountFeedbackController extends ParentController
{
    public function __construct($check)
    {
        parent::__construct($check);
    }

    public  function index(){
        $this->display('ebayAccountFeedback');
    }

}