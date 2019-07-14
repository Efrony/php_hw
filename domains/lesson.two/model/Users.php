<?php


namespace app\model;

class Users extends Model
{
    public $id;
    public $login;
    public $pass;

    public function getNameTable()
    {
        return 'users';
    }


}