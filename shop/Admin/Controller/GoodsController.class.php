<?php

namespace Admin\Controller;

use Model\GoodsModel;
use Think\Image;
use Think\Upload;
use Tools\AdminController;

class GoodsController extends AdminController {
    public function showlist() {
        $goods = new GoodsModel();
        //实现数据分页
        //h获取从条数、每页显示条数设置
        $cnt      = $goods->count();//获得总条数
        $per      = 7;
        $page_obj = new \Tools\Page($cnt, $per);
        //制作一条sql语句，获得每页数据
        $sql  = "select * from sw_goods order by goods_id desc ".$page_obj->limit;
        $info = $goods->query($sql);
        //制作页吗列表
        $pagelist = $page_obj->fpage([3,4,5,6,7,8]);

        $this->assign('pagelist', $pagelist);
        $this->assign('info', $info);
        $this->display();
    }

    public function tianjia() {
        $goods = D('Goods');
        if (!empty($_POST)) {
            if ($_FILES['goods_pic']['error'] === 0) {
                $cfg    = [
                    'rootPath' => './Public/Upload/' //保存根路径
                ];
                $up     = new Upload($cfg);
                $result = $up->uploadOne($_FILES['goods_pic']);
                //附件保存到数据库中，保存路径名即可
                $bigpicname             = $up->rootPath . $result['savepath'] . $result['savename'];
                $_POST['goods_big_img'] = substr($bigpicname, 2);
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
                $_POST['goods_small_img'] = substr($smallpicname, 2);
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