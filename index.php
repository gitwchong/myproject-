<?php
/**
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 */
define('MYPROJECT',realpath('./'));
define('CORE',MYPROJECT.'/core');
define('APP',MYPROJECT.'/app');
define('MODEL','app');

define('DEBUG',true);

include "vendor/autoload.php";

if (DEBUG){
    $whoops = new \Whoops\Run;
    $errorTitle = '错误';
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($errorTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_error','on');
}else{
    ini_set('display_error','off');
}
//new medoo();exit;
include CORE.'/common/function.php';

include CORE.'/autoload.php';

//类的自动加载
spl_autoload_register('\core\autoload::load');

\core\autoload::run();