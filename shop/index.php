<?php
header('content-type:text/html;charset=utf8');
//设置开发调试模式
define('APP_DEBUG', true);
//给系统资源文件请求路径设置常量
//Home前台
define('CSS_URL', '/shop/Home/Public/css');
define('IMG_URL', '/shop/Home/Public/images');
define('JS_URL', '/shop/Home/Public/js');
//后台
define('ADMIN_CSS_URL', '/shop/Admin/Public/css');
define('ADMIN_IMG_URL', '/shop/Admin/Public/img');
define('ADMIN_JS_URL', '/shop/Admin/Public/js');
//给静态资源文件请求路径设置常量
define('SITE_URL', 'http://file.com/shop/');
include '../ThinkPHP/ThinkPHP.php';