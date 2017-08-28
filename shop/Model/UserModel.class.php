<?php

namespace Model;

use Think\Model;

class UserModel extends Model {
    //设置验证规则
    //是否批处理验证
    protected $patchValidate = true;
    //自动验证定义
    protected $_validate = [
        ['username', 'require', '用户名不能为空'],
        ['password', 'require', '密码不能为空'],
        ['password2', 'require', '密码不能为空'],
        ['password2', 'password', '确认密码与密码保持一致', 0, 'confirm'],
        ['user_email', 'email', '邮箱格式不正确'],
        ['user_qq', 'number', 'qq号码为数字信息'],
        ['user_qq', '5-12', 'qq号码长度为5-12位', 0, 'length'],
        ['user_xueli', '2,3,4,5', '学习必须选择一个', 0, 'in'],
        ['user_hobby', 'check_hobby', '至少学则两个或者以上', 0, 'callback']
    ];

    protected function check_hobby($arg) {
        if (count($arg) < 2) {
            return false;
        }
        return true;
    }
}