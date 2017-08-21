<?php

namespace Home\Controller;

use Think\Controller;

class GoodsController extends Controller {
    function showlist() {
        echo '列表展示';
    }

    function detail() {
        echo '商品详情';
    }
}
