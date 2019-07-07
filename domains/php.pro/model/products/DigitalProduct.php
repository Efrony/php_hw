<?php

namespace app\model\products;

use app\model\Products;

class DigitalProduct extends Products
{
    public function getSummPrice($quantity = 1)
    {      
        $this->price = $this->price / 2;
        $this->summ += $this->price;
        return $this->price;
    }
}
