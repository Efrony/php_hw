<?php

namespace app\model;
use app\engine\Db;

abstract class Products extends Model {
    public $id;
    public $name;
    public $discription;
    public $price;
    public $brand;
    static public $summ;

    public function __construct(int $id, string $name, array $discription, int $price, string $brand)
    {   
        parent::__construct(new Db);
        $this->id = $id;
        $this->name = $name;
        $this->discription = $discription;
        $this->price = $price;
        $this->brand = $brand;
        $this->summ = 0;
    }

    abstract public function getSummPrice($quantity = 1);

    public function getNameTable()
    {
        return 'products';
    }


}


