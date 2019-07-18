<?php

namespace app\model;

class Users extends DbModel
{
    public $id;
    public $login;
    public $pass;

    public static function getNameTable()
    {
        return 'users';
    }


}