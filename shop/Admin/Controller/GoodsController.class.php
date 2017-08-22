<?php

namespace Admin\Controller;
use Model\EnglishModel;
use Model\GoodsModel;
use Think\Controller;

class GoodsController extends Controller {
    public function showlist() {
        $goods = new GoodsModel();
//        $english = new EnglishModel();
//        dump($english);

        //1.实例化父类Model对象
        $obj = D();
        //2.实例化Model对象,同时操作sw_user数据表
        $obj1=D('User');
        dump($obj1);
        $this->display();
    }

    public function tianjia() {
        $this->display();
    }

    public function udp() {
        $this->display();
    }
}