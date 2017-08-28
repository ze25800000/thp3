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
            $data = $user->create();
            if ($data) {
                $_POST['user_hobby'] = implode(',', $_POST['user_hobby']);
                $z                   = $user->add($_POST);
                if ($z) {
                    $this->redirect('Index/index');
                }
            } else {
                $this->assign('errorInfo', $user->getError());
            }
        }
        $this->display();
    }
}