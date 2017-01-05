<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-14
 * Time: 14:14
 */

namespace Home\Controller;


class SalerController extends ParentController
{
    public function iBayPublic(){
        $this->show('iBay刊登');
        $this->display('iBayPublic');

    }

//    public function WishBatchPublic(){
//        $this->show('WishBatchPublic Wish批量刊登');
//
//    }
//
//    public function eBaySalerTools(){
//        $this->show('eBaySalerTools eBay销售工具');
//
//    }
//
//
//    public function unlisted(){
//        $this->show('unlisted 未上架产品列表');
//    }
//
//    public function ebayAccountFeedback(){
//        $this->show('ebayAccountFeedback ebay账户好评率');
//    }




}