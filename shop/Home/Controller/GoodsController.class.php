<?php

namespace Home\Controller;

use Think\Controller;

class GoodsController extends Controller {
    function showlist() {
//        $this->display();
        $this->display('detail');
    }

    function detail() {
        $this->display();
    }
}
