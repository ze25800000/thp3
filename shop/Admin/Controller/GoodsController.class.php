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
        //1.数组方式添加数据
        $goods = D('Goods');
        $arr   = [
            'goods_name'   => '黑莓手机',
            'goods_price'  => 3400,
            'goods_number' => 120
        ];
        $d     = $goods->add($arr);
        var_dump($d);
        $this->display();
    }

    public function udp() {
        $this->display();
    }
}