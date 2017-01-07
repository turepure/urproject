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

class ListController extends Controller
{
    public function index()
    {
        $User = M('user');
        $result = $User->alias('u')
            ->join('LEFT JOIN ur_user_role ur ON u.ID=ur.userid')
            ->join('LEFT JOIN ur_role r ON ur.roleid=r.id')
            ->field('u.id,uername,password,rolename')
            ->select();
        $counter = $User->count();
        $this->assign('counter', $counter);
        $this->assign('result', $result);
        $this->display('admin-list');
    }

    public function add_user_display()
    {
        $res = M('role')->select();
        $this->assign('res', $res);
        $this->display('admin-user-add');
    }

    public function add_user()
    {
        $data = $_POST;
//        dump($data);die;
        $user = M('user');
        $user_role = M('user_role');
        $uername = $data['uername'];
        $password = $data['password'];
        $roleid = $data['roleid'];
        $user_info['uername'] = $uername;
        $user_info['password'] = $password;
        $user->add($user_info);
        $user_ret = $user->where("uername='$uername'")->field('id')->select();
        $userid= $user_ret[0]['id'];
        $role_info['userid'] = $userid;
        $role_info['roleid'] = $roleid;
        $user_role->add($role_info);


    }

//删除用户 根据用户的id
    public function delete_user()
    {
        $id = $_GET['id'];
//        dump($id);die;
        $User = M('user');
        $result = $User->where("id='$id'")->delete();
        if ($result !== false) {
            echo 'ok';
        } else {
            echo 'error!';
        }
    }


    //编辑用户 根据用户的id 编辑用户

    public function user_edit_display()
    {
        $id = $_GET['id'];
        $User = M('shop');
        $store_ret = $User->join("as shop
                            LEFT JOIN 
                            (select suffix,shopid from ur_user  LEFT JOIN ur_user_shop on ur_user_shop.userid=ur_user.id 
                            LEFT JOIN ur_shop on ur_user_shop.shopid=ur_shop.id where ur_user.id=" . $id . ")
                            as had
                            on shop.id=had.shopid"
        )
            ->field("shop.id as shopid,shop.suffix as store,if(had.shopid,'checked', '') as checked")
            ->select();

        $all_rolename_ret = M('role')->field('rolename,id')->select();
        $a_user_ret = M("user")->join(
            " left join ur_user_role on ur_user_role.userid=ur_user.id 
            LEFT JOIN ur_role on ur_role.id =ur_user_role.roleid")
            ->field('uername,password,rolename')
            ->select();
//        dump($a_user_ret);die;
        $rolenames = array();
        foreach ($all_rolename_ret as $key => $value) {
            $tmp_array = array();
            if ($value['rolename'] == $a_user_ret[0]['rolename']) {
                $tmp_array['rolename'] = $value['rolename'];
                $tmp_array['selected'] = 'selected';
                $tmp_array['roleid'] = $value['id'];

                array_push($rolenames, $tmp_array);
            } else {
                $tmp_array['rolename'] = $value['rolename'];
                $tmp_array['selected'] = '';
                $tmp_array['roleid'] = $value['id'];
                array_push($rolenames, $tmp_array);
            }
        }
//        dump($rolenames);die;
        $this->assign('userid',$id);
        $this->assign('rolenames', $rolenames);
        $this->assign('userinfo', $a_user_ret[0]);
        $this->assign('stores', $store_ret);
        $this->display('user-edit');
    }

    //编辑后保存==》更新
    public function user_save()
    {
        $user_shop = M('user_shop');
        $data = $_POST;
        $shops = $data['shopid'];
        $user_shop->where("userid={$data['userid']}")->delete();
        if(sizeof($shops)!=0){
            foreach ($shops as $shop){
                $info['userid'] = $data['userid'];
                $info['shopid'] = $shop;
                $user_shop->add($info);
            }
        }
        echo '修改完成';
    }
}