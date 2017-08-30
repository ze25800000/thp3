<?php

namespace Admin\Controller;

use Think\Controller;
use Think\Verify;

class ManagerController extends Controller {
    public function login() {
        if (!empty($_POST)) {
            $vry = new Verify();
            if ($vry->check($_POST['captcha'])) {
                $userpwd = [
                    'mg_name' => $_POST['admin_user'],
                    'mg_pwd'  => $_POST['admin_psd']
                ];
                $info    = D('Manager')->where($userpwd)->find();
                if ($info) {
                    session('admin_name', $info['mg_name']);
                    session('admin_id', $info['mg_id']);
                    $this->redirect('index/index');
                } else {
                    echo '用户名或密码错误';
                }
            } else {
                echo '错误';
            }
        }
        $this->display();
    }

    public
    function verifyImg() {
        $cfg  = [
            'imageH'   => 35,
            'imageW'   => 90,
            'fontSize' => 13,
            'length'   => 4,
            'fontttf'  => '2.ttf',
        ];
        $very = new Verify($cfg);
        $very->entry();
    }
}