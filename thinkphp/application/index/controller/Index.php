<?php
namespace app\index\controller;

class Index
{
    public static function index()
    {
        return '';
    }

    public function hello($name = 'ThinkPHP5')
    {
        echo  'hello,' . $name;
    }
}
