<?php
namespace app\Controllers;

use core\lib\model;

class IndexController extends\core\autoload
{
    public function index()
    {
       /* $model = new \app\Model\AdModel();
        $res = $model->getList();

        $res1 = $model->getOne(40);
        dump($res);
        dump($res1);*/
$data = 'DFLJ';
        $this->assign('data',$data);
        $this->display('index.html');
    }

    public function test()
    {
        $data = 'test';
        $this->assign('data',$data);
        $this->display('test.html');
    }
}