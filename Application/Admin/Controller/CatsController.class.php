<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-21
 * Time: 14:48
 */

namespace Admin\Controller;
use Think\Controller;
header('ContentType:text/html;charset=utf-8');

class CatsController extends Controller
{
    public function index(){

        $Cats =M('cats');
       $list =  $Cats->select();
        $this->assign('result',$list);
        $this->display('cats');
    }

    public function index2(){
        $list = M('Cats')->select();
        $tree = $this->tree_list($list);
        $this->assign('list', $tree);
//dump($list);die;
        $this->display('category');
    }
    /**
     * 递归循环：自己调用自己id
     * 注意：//这是一个递归的结束点，如果没有结束点，就会出现死循环
     */
   public function tree_list(&$list, $parent_id = 0){
        $tree = array();
        if(!$list) return false;
        foreach($list as &$val){
            if($parent_id == $val['categoryparentid']){
                $val['child'] = $this->tree_list($list, $val['id']);
                $tree[] = $val;

            }
        }


        return $tree;
    }


    public function goodsList(){
        $cat_id = I('get.id', 0, intval);
        if(!$cat_id) $this->error('此商品分类不存在，请返回首页');

        $where = array('id'=> $cat_id);
        $cat_info = M('category')->where($where)->find();
        if(!$cat_info) $this->error('此商品分类不存在，请返回首页');

        //留给你们思考：如果是父类的ID，那它的子类是不是都应该出来？
        $list = M('Cats')->select();
        $ids = array();
        $child_list = $this->get_child_ids($list, $cat_id, $ids);

        $where1['id'] = array('in', implode(',', $ids));
        $list = M('Cats')->where($where1)->select();

        $this->assign('data', $cat_info);
        $this->assign('list', $list);
        $this->render('商品列表');
        $this->display('goodsList');
    }


    /**
     * 递归循环：自己调用自己
     * 注意：//这是一个递归的结束点，如果没有结束点，就会出现死循环
     */
    private function get_child_ids(&$list, $parent_id = 0, &$ids){
        if(!$list) return false;

        foreach($list as &$val){
            if($parent_id == $val['parent_id']){
                array_push($ids, $val['cat_id']);
                $this->get_child_ids($list, $val['cat_id'], $ids);
            }
        }
    }

    //增加分类
    public function add_cats_display(){
        $Cats= M('cats');
        $list =  $Cats->where("CategoryParentID='0'")->select();
        $this->assign('result',$list);
        $this->display('add-cats');

    }

    public function add_cats()
    {

        $data['CategoryParentName'] = $_GET['categoryparentname'];
        $data['CategoryName'] = $_GET['categoryname'];
//        dump($data['CategoryParentName']);die;
        $Cats = M('Cats');
        $parRes = $Cats->where("CategoryName='$data[CategoryParentName]'")
            ->field('id,CategoryLevel')
            ->find();
        if ($data['CategoryParentName']== '全部类别') {
            $data['CategoryParentID'] = 0;
        } else {
            $data['CategoryParentID'] = $parRes['id'];
        }
        $data['CategoryLevel'] = $parRes['categorylevel'] + 1;
//        dump($data);die;

        if ($res !== false) { $res = $Cats->add($data);
            echo 'ok';
        }

    }
//删除
    public function delete_cats(){
        $id = $_POST['id'];
        $res = M('Cats')->where("id='$id'")->delete();
        if($res!==false){
            echo 'OK';
        }
    }

    //编辑
    public function cats_edit_display(){
        $id = $_GET['id'];
        $Cats = M('Cats');
        $res = $Cats->where("id='$id'")->find();
        $this->assign('result',$res);
        $this->display('cats-edit');
    }

    public function cats_save(){
       $data['id'] = $_POST['id'];
        $data['CategoryParentName'] = $_POST['categoryparentname'];
        $data['CategoryName'] = $_POST['categoryname'];
//        dump($data);die;
        $Cats = M('Cats');
        $res = $Cats->where("id='$data[id]'")->save($data);
        $this->success('ok', 'admin/cats/index');
//        $this->redirect('cats/index');
        if($res!==false){
            echo 'ok';

        }else{
            echo 'error!';
        }


    }






}






