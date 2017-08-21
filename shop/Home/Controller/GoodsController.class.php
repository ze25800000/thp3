<?php

namespace Home\Controller;

use Think\Controller;

class GoodsController extends Controller {
    function showlist() {
//        $this->display();
//        $this->display('detail');
        $this->display('User/login');
    }

    function detail() {
        $this->display();
    }
}
