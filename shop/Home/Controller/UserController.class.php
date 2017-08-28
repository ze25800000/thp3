<?php

namespace Home\Controller;

use Think\Controller;
use Model\UserModel;

class UserController extends Controller {
    public function login() {
        $this->display();
    }

    public function register() {
        $user = new UserModel();
        if (!empty($_POST)) {
//            $_POST['user_hobby'] = implode(',', $_POST['user_hobby']);
//            $z                   = $user->add($_POST);
            $data = $user->create();
            if ($data) {
                echo 'success';
            } else {
                dump($user->getError());
            }
        } else {
            $this->display();
        }
    }
}