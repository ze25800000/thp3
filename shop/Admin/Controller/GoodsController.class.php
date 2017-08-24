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
        $this->display();
    }

    public function upd() {
        //修改数据库数据
        //数据库必须设置条件，主键id或者where（）方法，二选一即可，否则执行失败
        $goods               = D('Goods');
        $goods->goods_name   = '见过pro';
        $goods->goods_price  = 1200;
        $goods->goods_weight = 200;
        $result              = $goods->where('goods_id=164')->save();
        //mysql数据库允许一次性修改全部记录信息
        //现实生产中不能一次性修改数据表的全部记录信息
        dump($result);
        $this->display();
    }
}