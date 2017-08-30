<?php

namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller {
    public function index() {
        $this->display();
    }

    public function head() {
        $this->display();
    }

    public function left() {
        //用户id
        $admin_id   = session('admin_id');
        $admin_name = session('admin_name');
        //根据id获得用户信息
        $admin_info = D('Manager')->find($admin_id);
        //角色id
        $role_id = $admin_info['mg_role_id'];
        //获得角色信息
        $role_info = D('Role')->find($role_id);
        //权限的ids信息
        $auth_ids = $role_info['role_auth_ids'];
        //获取全部权限数据
        if ($admin_name === 'admin') {
            $auth_infoA = D('Auth')->where("auth_level=0")->select();//顶级权限
            $auth_infoB = D('Auth')->where("auth_level=1")->select();//次顶级
        } else {
            $auth_infoA = D('Auth')->where("auth_level=0 and auth_id in ($auth_ids)")->select();//顶级权限
            $auth_infoB = D('Auth')->where("auth_level=1 and auth_id in ($auth_ids)")->select();//次顶级
        }
        $this->assign('auth_infoA', $auth_infoA);
        $this->assign('auth_infoB', $auth_infoB);
        $this->display();
    }

    public function right() {
        $this->display();
    }
}