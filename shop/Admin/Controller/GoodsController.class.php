<?php

namespace Admin\Controller;
use Model\GoodsModel;
use Think\Controller;

class GoodsController extends Controller {
    public function showlist() {
        $goods = new GoodsModel();
        dump($goods);
        $this->display();
    }

    public function tianjia() {
        $this->display();
    }

    public function udp() {
        $this->display();
    }
}