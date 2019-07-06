<?php

namespace app\model;

class Products extends Model {
    public $id;
    public $name;
    public $discription;
    public $material;
    public $size;
    public $price;
    public $brand;

    public function getNameTable()
    {
        return 'products';
    }


}


