<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-21
 * Time: 15:03
 */

namespace Admin\Controller;
use Think\Controller;
header('ContentType:text/html;charset=utf-8');

class ShopController extends Controller
{
    public function index(){
        $Shop =M('shop');
        $counter = $Shop->count();
//        $Page       = new \Think\Page($counter,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
//        $show       = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
//        $list = $Shop->limit($Page->firstRow.','.$Page->listRows)->select();
        $list = $Shop->select();
        $this->assign('counter',$counter);
        $this->assign('res',$list);
//        $this->assign('page',$show);// 赋值分页输出
        $this->display('shop');
//         $Shop =M('shop');
//         $counter = $Shop->count();
//         $res= $Shop->select();
//        $this->assign('counter',$counter);
//        $this->assign('res',$res);
//         $this->display('shop');

    }

    public function add_shop_display(){
        $this->display('add-shop');
    }
    public function add_shop(){
            $data = $_POST;
            $result =  M('shop')->add($data);
            if($result!==false){
                echo 'OK';
            }
            else{
                echo 'error!';
            }
    }

    public function delete_shop(){
        $id =$_POST['id'] ;
        $Role = M('shop');
        $result = $Role->where("id='$id'")->delete();

        if($result!==false){
            echo 'OK';
        }else{
            echo 'error!';
        }
    }
    public function shop_edit_display()
    {
        $id = $_GET['id'];
        $Shop = M('cats');
        $res = $Shop->join(
            "ur_cats LEFT JOIN 
(select ur_cats.id as catid,ur_cats.CategoryLevel,ur_cats.CategoryName,ur_cats.CategoryParentID,ur_cats.CategoryParentName,ur_shop.id as shopid,ur_shop.shopname,ur_shop.suffix,
IF(ur_shop.id,'checked','') as has
 from ur_cats LEFT JOIN  ur_shopCats on ur_cats.id=ur_shopCats.catid LEFT JOIN ur_shop on ur_shop.id=ur_shopCats.shopid where shopid=".$id.") as tmp_table on ur_cats.id =tmp_table.catid")->field("ur_cats.id as catid,ur_cats.CategoryLevel,ur_cats.CategoryName,ur_cats.CategoryParentID,ur_cats.CategoryParentName,tmp_table.shopid,tmp_table.shopname,tmp_table.suffix,tmp_table.has")->select();
//        dump($res);die;
        $shopCat = $this->cat_tree($res);
//        dump($shopCat);die;
        $this->assign('shopCat',$shopCat);
        $this->display('shop-edit');
    }
        private  function  cat_tree(&$list)
    {
        $tree = array();
        if (!$list) return false;
        foreach ($list as $key => $val) {
            if($val['categorylevel']==1) {
                $tree[$val['categoryname']] = array();
            }
        }
        foreach ($list as $key => $val) {
            if($val['categorylevel']==2){
                array_push($tree[$val['categoryparentname']],array('cat'=>$val['categoryname'],'checked'=>$val['has']));
            }
        }


        return $tree;
    }
    public function shop_save(){
        $data = $_POST;
        $Shop = M('shop');
        $res = $Shop->where("id='$_POST[id]'")->save($data);
        if($res!==false){
            $msg ='OK';
            echo $msg;
        }
    }

}