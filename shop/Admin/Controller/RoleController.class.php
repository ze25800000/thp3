<?php

namespace Admin\Controller;

use Think\Controller;

class RoleController extends Controller {
    public function showlist() {
        $info = D('Role')->select();
        $this->assign('info', $info);
        $this->display();
    }

    public function distribute($role_id) {
        $role_info  = D('Role')->find($role_id);
        $auth_infoA = D('Auth')->where('auth_level=0')->select();
        $auth_infoB = D('Auth')->where('auth_level=1')->select();
        $this->assign('role_info', $role_info);
        $this->assign('auth_infoA', $auth_infoA);
        $this->assign('auth_infoB', $auth_infoB);
        $this->display();
    }
}