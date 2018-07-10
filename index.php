<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
define('MYPROJECT',realpath('/'));
define('CORE',MYPROJECT.'/core');
define('APP',MYPROJECT.'/app');

define('DEBUG',true);

if (DEBUG){
    ini_set('display_error','on');
}else{
    ini_set('display_error','off');
}
