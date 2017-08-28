<?php

namespace Admin\Controller;

use Model\EnglishModel;
use Model\GoodsModel;
use Think\Controller;
use Think\Image;
use Think\Upload;

class GoodsController extends Controller {
    public function showlist() {
        $goods = new GoodsModel();
        //1,查询数据表 全部字段、全部信息
        $info = $goods->order('goods_id desc')->select();
        //2,显示主键id等于9的id信息
//        $info = $goods->select(9);
        //3,查询id值,查询一条记录信息
//        $info = $goods->select('20, 30,40');
        $this->assign('info', $info);
        $this->display();
    }

    public function tianjia() {
        $goods = D('Goods');
        if (!empty($_POST)) {
            if ($_FILES['goods_pic']['error'] === 0) {
                $cfg    = [
                    'rootPath' => './Public/upload/' //保存根路径
                ];
                $up     = new Upload($cfg);
                $result = $up->uploadOne($_FILES['goods_pic']);
                //附件保存到数据库中，保存路径名即可
                $bigpicname             = $up->rootPath . $result['savepath'] . $result['savename'];
                $_POST['goods_big_img'] = $bigpicname;
                //给上传好的图片制作缩略图
                $im = new Image();
                //打开原图片
                $im->open($bigpicname);
                //为原图片制作缩略图
                $im->thumb(125, 125);
                //把制作好的缩略图报存到服务器
                //缩略图和原图在同一位置
                $smallpicname = $up->rootPath . $result['savepath'] . "small_" . $result['savename'];
                $im->save($smallpicname);
                $_POST['goods_small_img'] = $smallpicname;

            }
            //收集表单信息
            $z = $goods->add($_POST);
            if ($z) {
                $this->redirect('showlist', [], 2, '添加商品成功');
            } else {
                $this->redirect('tianjia', [], 2, '添加商品失败');
            }
        } else {
            $this->display();
        }
    }

    public function upd($goods_id) {
        $goods = D('Goods');
        if (!empty($_POST)) {
            $z = $goods->save($_POST);
            if ($z) {
                $this->redirect('showlist', [], 2, '修改商品成功');
            } else {
                $this->redirect('upd', ['goods_id' => $goods_id], 2, '修改商品失败');
            }
        } else {
            $info = $goods->find($goods_id);
            $this->assign('info', $info);
            $this->display();
        }
    }
}