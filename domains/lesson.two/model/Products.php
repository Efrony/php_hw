<?php

namespace app\model;


class Products extends DbModel {
    public $id;
    public $name;
    public $discription;
    public $price;
    public $brand;

    public function __construct(int $id, string $name)
    {   
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
    }

    public static function getNameTable()
    {
        return 'product';
    }


}


