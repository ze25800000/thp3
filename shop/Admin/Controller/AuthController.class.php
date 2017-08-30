<?php

namespace Admin\Controller;

use Tools\AdminController;

class AuthController extends AdminController {
    //列表展示
    public function showlist() {
        $info = D('Auth')->order('auth_path asc')->select();
        $this->assign('info', $info);
        $this->display();
    }

    public function tianjia() {
        $auth = new \Model\AuthModel();
        if ($_POST) {
            $z = $auth->saveData($_POST);
            if ($z) {
                $this->redirect('showlist', [], 2, '分配权限成功');
            } else {
                $this->redirect('tianjia', [], 2, '添加权限失败');
            }
        } else {
            $auth_infoA = D('Auth')->where('auth_level=0')->select();
            $auth_infoB = D('Auth')->where('auth_level=1')->select();
            $this->assign('auth_infoA', $auth_infoA);
            $this->display();
        }
    }
}