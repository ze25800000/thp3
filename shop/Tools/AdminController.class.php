<?php

namespace Tools;

use Think\Controller;

class AdminController extends Controller {
    public function __construct() {
        parent::__construct();
        //当前请求的控制器-操作方法
        $nowac = CONTROLLER_NAME . "-" . ACTION_NAME;
        //获得当前用户对应角色的权限列表信息
        $admin_name = session('admin_name');
        $admin_id   = session('admin_id');
        $rang_ac    = "Manager-login,Manager-verifyImg";
        if (empty($admin_id) && strpos($rang_ac, $nowac) === false) {
//            $this->redirect('Manager/login');
            $js = "<script>window.top.location.href='/shop/index.php/Admin/Manager/login';</script>";
            echo $js;
        }
        $admin_info = D('Manager')->find($admin_id);
        //角色信息
        $role_id   = $admin_info['mg_role'];
        $role_info = D('Role')->find($role_id);
        //设置默认允许访问的权限
        $allowac = "Manager-login,Manager-logout,Manager-verifyImg,Index-left,Index-right,Index-head,Index-index";
        //拥有的权限信息
        $auth_ac = $role_info['role_auth_ac'];
        //strpos()在一个大的字符串中判断一个小的字符串从左边开始第一次出现的位置
        if (strpos($auth_ac, $nowac) === false && strpos($allowac, $nowac) === false && $admin_name !== 'admin') {
            exit('没有访问权限');
        };
    }
}