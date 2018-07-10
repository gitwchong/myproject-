<?php
namespace app\Model;

use core\lib\model;

class AdModel extends model
{
    public $table = 'ad';
    public function getList()
    {
        return $this->select($this->table,'*');
    }

    public function getOne($id)
    {
        return $this->get($this->table,'*',[
            'id' => $id
        ]);
    }
}