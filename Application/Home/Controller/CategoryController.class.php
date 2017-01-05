<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-13
 * Time: 08:47
 */
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class CategoryController extends ParentController {

//    public function __construct($check=true){
//        parent::__construct($check);
//    }


/**
* 从顶层逐级向下获取子类
* @param number $pid
* @param array $lists
* @param number $deep
* @return array
*/
   public function getLists($pid = 0, &$lists = array(), $deep = 1)
    {
        $db = M('moduel');
        $res = $db ->where('parentid='.$pid)->select();
        foreach($res as $key=>$val)
        {
            $row['moduelname'] = str_repeat('', $deep) . '|---' . $val['moduelname'];
            $lists[] = $row;
            $this->getLists($val['parentid'], $lists, ++$deep); //进入子类之前深度+1         --$deep; //从子类退出之后深度-1     }
            dump($lists);die;
        }


        return $lists;

    }

    public function displayLists($pid = 0, $selectid = 1)
    {

        $result = $this->getLists($pid);
        $str = '<select>';
        foreach ($result as $item) {
            $selected = "";
            if ($selectid == $item['parentid']) {
                $selected = 'selected';
            }
            $str .= '<option ' . $selected . '>' . $item['moduelname'] . '</option>';
        }
        return $str .= '</select>';
    }

    /**
     * 从子类开始逐级向上获取其父类
     * @param number $cid
     * @param array $category
     * @return array:
     */
   public  function getCategory($cid, &$category = array())
    {
//        $sql = 'SELECT * FROM moduel WHERE id=' . $cid . ' LIMIT 1';
//        $result = mysqli_query($sql);
//        $row = mysqli_fetch_assoc($result);
        $db = M('moduel');
        $res = $db ->where('parentid='.$cid)->select();
//       dump( $res);die;
        foreach($res as $key=>$row){
            $category[] = $row;

        }
     $this->getCategory($row['parentid'], $category);
     return  krsort($category); //逆序,达到从父类到子类的效果     return $category;
    }

   public function displayCategory($cid)
    {
        $result = $this->getCategory($cid);
        $str = "";
        foreach ($result as $item) {
            $str .= '<a href="' . $item['parentid'] . '">' . $item['moduelname'] . '</a>';
        }
        return substr($str, 0, strlen($str) - 1);
    }

    /**
     * 模块分类列表
     */
//    public function categoryList(){
//       $list = M('moduel')->select();
//        $tree = $this->tree_list($list);
//        dump($tree);die;
//        $this->assign('list', $tree);
//        $this->display('category');
//    }
//
//    /**
//     * 递归循环：自己调用自己
//     * 注意：//这是一个递归的结束点，如果没有结束点，就会出现死循环
//     */
//    private function tree_list(&$list, $parent_id =0){
//        $tree = array();
//
//        if(!$list) return false;
//        foreach($list as &$val){
//            if($parent_id == $val['parentid']){
//                $val['child'] = $this->tree_list($list, $val['id']);
//                $tree[] = $val;
//            }
//        }
//        return $tree;
//    }

    public function categoryList($id){

        $list =  M('user')->join('ur_user LEFT JOIN ur_user_role on ur_user.id = ur_user_role.userid
LEFT JOIN ur_role on ur_role.id=ur_user_role.roleid LEFT JOIN ur_role_permission
on ur_role.id=ur_role_permission.roleid
LEFT JOIN ur_moduel_permission on ur_role_permission.mpid=ur_moduel_permission.id
LEFT JOIN ur_permission on ur_permission.id = ur_moduel_permission.priid
LEFT JOIN ur_moduel as um1 on um1.id = ur_moduel_permission.modid
LEFT JOIN ur_moduel  as um2 on um1.parentid=um2.id')->field("ur_user.id as id, ur_user.uername,ur_user.password,ur_role.rolecode,
ur_role.rolename,um1.id as mid, um1.moduelcode,um1.moduelname as childmoduelname,
um1.levelname, um1.parentid,um1.moduelurl,um2.moduelname as parentmoduelname ,ur_permission.pricode,ur_permission.priname")->where("ur_user.id=$id")->select();
        $tree = $this->tree_list($list);

        $this->assign('list', $tree);
        $username = session('session_name');
        $this->assign('username',$username);
        $role =session('role');
        $this->assign('role',$role);
        $this->display('category');
    }

    private function tree_list(&$list)
    {

        $tree = array();
        if (!$list) return false;
        foreach ($list as $key => $val) {
            if ($val['levelname'] == 1) {
                $tree[$val['childmoduelname']] = array();
            }
        }
        foreach ($list as $key => $value) {
            if ($value['levelname'] == 2) {
                array_push($tree[$value['parentmoduelname']], $value['childmoduelname']);
            }
        }

        return $tree;
    }


    public function welcome(){
         $this->display('welcome');
    }

}
