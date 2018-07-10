<?php

namespace core\lib;

use core\lib\conf;

class route
{
    public $ctrl;
    public $action;
    public function __construct()
    {
        /**
         * xxx.com/index.php/index/index
         * 1.隐藏index.php
         * 2.获取url 参数部分
         * 3.返回对应控制器和方法
         */
        $this->ctrl = conf::get('CONTROLLER','route');
        $this->action = conf::get('ACTION','route');
        $path = $_SERVER['REQUEST_URI'];
        if ($path && $path != '/'){
            // index/index
            $patharr = explode('/',trim($path,'/'));
            if (isset($patharr[0])){
                $this->ctrl = $patharr[0];
            }

            $this->action = isset($patharr[1]) ? $patharr[1] : conf::get('ACTION','route');
            //url多余部分数据转换成 GET
            //id/1/str/2
            $count = count($patharr) + 2;
            $i = 2;
            while ($i < $count){
                if (isset($patharr[$i + 1])){
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                }
                $i += 2;
            }
        }
    }
}
