<?php

namespace Model;

use Think\Model;

class UserModel extends Model {
    //设置验证规则
    //自动验证定义
    protected $_validate = [
        ['username','require','用户名不能为空'],
    ];
}