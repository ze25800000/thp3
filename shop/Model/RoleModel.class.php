<?php

namespace Model;

use Think\Model;

class RoleModel extends Model {
    public function saveAuth($role_id, $authids) {
        //数组啊是躺床变成字符串的authid
        $authid_str = implode(',', $authids);
        //根据字符串的authid信息，查询对应的操作方法
        $authinfo = D('Auth')->select($authid_str);
        $s        = '';
        foreach ($authinfo as $k => $v) {
            if (!empty($v['auth_c']) && !empty($v['auth_a'])) {
                $s .= $v['auth_c'] . "-" . $v['auth_a'].',';
            }
        }
        $s = rtrim($s, ',');
        $sql = "update sw_role set role_auth_ids='$authid_str',role_auth_ac='$s' where role_id='$role_id'";
        return $this->execute($sql);
    }
}