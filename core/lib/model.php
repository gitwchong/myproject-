<?php
namespace core\lib;

use core\lib\conf;
use Medoo\Medoo as Medoo;

class model extends Medoo
{
    public function __construct()
    {
        $option = conf::all('databases');
        parent::__construct($option);
    }
}