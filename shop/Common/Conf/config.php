<?php
return array(
    //'配置项'=>'配置值'
    'SHOW_PAGE_TRACE'    => true,
    //设置请求的默认分组
    'DEFAULT_MODULE'     => 'Home',
    //设置一个对比的分组列表
    'MODULE_ALLOW_LIST'  => ['Admin', 'Home'],
    //开启smarty模板引擎
    'TMPL_ENGINE_TYPE'   => 'Smarty',
    //smarty相关配置
//    'TMPL_ENGINE_CONFIG' => [
//        'left_delimiter'=>'<%%%',
//        'right_delimiter'=>'%%%>',
//    ]
);