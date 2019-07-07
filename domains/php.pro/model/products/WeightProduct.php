<?php

namespace app\model\products;

use app\model\Products;

class WeightProduct extends Products
{
    public function getSummPrice($quantity = 1)
    {   
        $this->summ += $this->price * $quantity;
        return $this->price * $quantity;
    }
}
