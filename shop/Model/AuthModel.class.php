<?php

namespace Model;

use Think\Model;

class AuthModel extends Model {
    public function saveData($four) {
        $newid = $this->add($four);
        if ($four['auth_pid'] == 0) {
            $path = $newid;
        } else {
            $pinfo = $this->find($four['auth_pid']);
            $ppath = $pinfo['auth_path'];
            $path  = $ppath . "-" . $newid;
        }
        $level = substr_count($path, '-');
        $sql   = "update sw_auth set auth_path='$path',auth_level='$level' where auth_id=$newid";
        return $this->execute($sql);
    }
}