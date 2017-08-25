<?php

namespace Home\Controller;

use Think\Controller;

class UserController extends Controller {
    public function login() {
        $this->display();
    }

    public function register() {
        $user = D('User');
        if (!empty($_POST)) {
            $_POST['user_hobby'] = implode(',', $_POST['user_hobby']);
            $z = $user->add($_POST);
            echo $z;
        } else {
            $this->display();
        }
    }
}