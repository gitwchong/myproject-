<?php

namespace core\lib\drive\log;

use core\lib\conf;

//文件系统
class file
{
    public $path;//日志存储位置
    public function __construct()
    {
        $conf = conf::get('OPTION','log');
        $this->path = $conf['path'].date('HmdH').'/';
    }

    public function log($message,$file = 'log')
    {
        /**
         * 1.确认文件存储位置是否存在
         *  新建目录
         * 2.写入日志
         */
        if (!is_dir($this->path)){
            mkdir($this->path,'077',true);
        }
        return file_put_contents($this->path.$file.'.php',date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
    }
}
