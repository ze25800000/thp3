<?php

namespace Admin\Controller;

use Think\Controller;
use Think\Verify;

class ManagerController extends Controller {
    public function login() {
        if (!empty($_POST)) {
            $vry = new Verify();
            if ($vry->check($_POST['captcha'])) {
                echo '验证码正确';
            } else {
                echo '错误';
            }
        }
        $this->display();
    }

    public function verifyImg() {
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