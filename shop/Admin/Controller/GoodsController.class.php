<?php

namespace Admin\Controller;
use Model\EnglishModel;
use Model\GoodsModel;
use Think\Controller;

class GoodsController extends Controller {
    public function showlist() {
        $goods = new GoodsModel();
        $english = new EnglishModel();
        dump($english);
        $this->display();
    }

    public function tianjia() {
        $this->display();
    }

    public function udp() {
        $this->display();
    }
}