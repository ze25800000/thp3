<?php

namespace Admin\Controller;

use Model\EnglishModel;
use Model\GoodsModel;
use Think\Controller;

class GoodsController extends Controller {
    public function showlist() {
        $goods = new GoodsModel();
        //1,查询数据表 全部字段、全部信息
        $info = $goods->select();
        //2,显示主键id等于9的id信息
        $info = $goods->select(9);
        //3,查询id值,查询一条记录信息
        $info = $goods->select('20, 30,40');
        $this->assign('info', $info);
        $this->display();
    }

    public function tianjia() {
        //2.AR方式添加数据
        $goods              = D('Goods');
        $goods->goods_name  = "小米手机";
        $goods->goods_price = 2000;
        $goods->weight      = 120;
        $z = $goods->add();
        echo $z;
        $this->display();
    }

    public function udp() {
        $this->display();
    }
}