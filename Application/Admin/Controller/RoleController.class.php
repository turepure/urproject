<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-12-19
 * Time: 9:01
 */

namespace Admin\Controller;
use Think\Controller;
header('Content-Type:text/html;charset=utf-8');

class roleController extends Controller
{
    public function index(){
//        SELECT r.*, p.priname FROM ur_role r LEFT JOIN ur_rolePermission rp ON r.id =rp.roleid
//LEFT JOIN ur_permission p ON p.id =rp.mpid
        $Role = M('role');
        $result = $Role->alias('r')
            ->field('r.id,r.rolecode,r.rolename')
            ->select();
        $counter = $Role->count();
        $this->assign('result',$result);
        $this->assign('counter',$counter);
        $this->display('admin-role');
    }



     public function add_role_display(){
         $this->display('admin-role-add');
     }

    public function add_role(){
       $data = $_POST;
      $result =  M('role')->add($data);
        if($result!==false){
            echo 'OK';
        }
        else{
            echo 'error!';
        }


    }

    public function delete_role(){
      $id =$_POST['id'] ;
      $Role = M('role');
      $result = $Role->where("id='$id'")->delete();

        if($result!==false){
            echo 'OK';
        }else{
            echo 'error!';
        }

    }

    //编辑用户 根据用户的id 编辑用户

    public function role_edit_display(){
        $id = $_GET['id'];
        $Moduel = M('moduel');
        $res = $Moduel->join('ur_moduel 
                    LEFT JOIN ur_moduel as um2 on ur_moduel.parentid=um2.id
                    LEFT JOIN ur_moduel_permission on ur_moduel.id=ur_moduel_permission.modid
                    LEFT JOIN 
                    (
                    SELECT 
                    ur_role.rolecode,ur_role.rolename,um1.id as mid,                 
                    um1.moduelcode,um1.moduelname as childmoduelname,um1.levelname,
                    um1.parentid,um1.moduelurl,um2.moduelname as parentmoduelname,
                    ur_permission.pricode,ur_permission.priname from ur_role  
                    LEFT JOIN ur_user_role on ur_role.id=ur_user_role.roleid
                    LEFT JOIN ur_role_permission on ur_role.id=ur_role_permission.roleid
                    LEFT JOIN ur_moduel_permission on ur_role_permission.mpid=ur_moduel_permission.id 
                    LEFT JOIN ur_permission on ur_permission.id = ur_moduel_permission.priid
                    LEFT JOIN ur_moduel as um1 on um1.id = ur_moduel_permission.modid 
                    LEFT JOIN ur_moduel as um2 on um1.parentid=um2.id
                    WHERE (  ur_role.id='.$id.') ) as tmp_table on ur_moduel.id = tmp_table.mid')
                    ->field("ur_moduel.id,ur_moduel.moduelname as childname,ur_moduel.levelname,ur_moduel_permission.id as mpid,
                        ur_moduel.parentid,um2.moduelname as parentname,IF(tmp_table.mid,'checked','') as has")
                    ->select();
        $pername = M('role')->field("rolename,rolecode")->where("id=$id")->select();
        $permission = $this->tree_list($res);
//        dump($permission);die;
        $this->assign('role_id',$id);
        $this->assign('permission',$permission);
        $this->assign('result',$pername[0]);
        $this->display('role_edit');
    }
    //编辑后保存==》更新
    public function role_save(){
        $data = $_POST;
//        dump($data);die;
        $role_id = $data['roleID'];
        $role_mpid = $data['role-child'];
        $info['roleid'] = $role_id;
        $info['role_mpid'] = $role_mpid;
        $Role = M('role_permission');
        $Role->where("roleid=$role_id")->delete();
        foreach ($role_mpid as $mpid){
            //$check = $Role->field("id,roleid,mpid")->where("roleid=$role_id and mpid=$mpid")->select();
            $info['roleid'] = $role_id;
            $info['mpid'] = $mpid;
//            if(sizeof($check) != 1){
//                $Role->add($info);
//                }
            $Role->add($info);

        }
        echo "修改完毕！";
    }

    //批量删除
    public function del(){
        // $name = getActionName();   //作为公共的函数使用时添加
        $adminUsersModel = D("role"); //获取当期模块的操作对象
        $id = $_GET['id'];  //判断id是数组还是一个数值
        if(is_array($id)){
            $where = 'id in('.implode(',',$id).')';
        }else{
            $where = 'id='.$id;
        }  //dump($where);
        $list=$adminUsersModel->where($where)->delete();
        if($list!==false) {
            $this->success("成功删除{$list}条！", U("Admin/User/lists"));
        }else{
            $this->error('删除失败！');
        }
    }

    private function tree_list(&$list)
    {

        $tree = array();
        if (!$list) return false;
        foreach ($list as $key => $val) {
            if ($val['levelname'] == 1) {
                $tree[$val['childname']] = array();
            }
        }
        foreach ($list as $key => $value) {
            if ($value['levelname'] == 2) {
                array_push($tree[$value['parentname']], array("moduel"=>$value['childname'],"checked"=>$value['has'],"mpid"=>$value['mpid']));
            }
        }

        return $tree;
    }




}