<?php

namespace Admin\Controller;

use Model\RoleModel;
use Think\Controller;

class RoleController extends Controller {
    public function showlist() {
        $info = D('Role')->select();
        $this->assign('info', $info);
        $this->display();
    }

    public function distribute($role_id) {
        $role = new RoleModel();
        if (!empty($_POST)) {
            $z = $role->saveAuth($role_id, $_POST['auth_id']);
            if ($z) {
                $this->redirect('showlist', [], 2, '分配权限成功');
            } else {
                $this->redirect('distribute', ['role_id' => $role_id], 2, '分配权限失败');
            }
        } else {
            //查询被分配权限的角色信息
            $role_info = $role->find($role_id);
            //角色已经拥有的权限信息
            $have_auth  = explode(',', $role_info['role_auth_ids']);
            $auth_infoA = D('Auth')->where('auth_level=0')->select();
            $auth_infoB = D('Auth')->where('auth_level=1')->select();
            $this->assign('have_auth', $have_auth);
            $this->assign('role_info', $role_info);
            $this->assign('auth_infoA', $auth_infoA);
            $this->assign('auth_infoB', $auth_infoB);
            $this->display();
        }
    }
}