<?php

namespace app\model\products;

use app\model\Products;

class PieceProduct extends Products
{
    public function getSummPrice($quantity = 1)
    {   
        $this->summ += $this->price;
        return $this->price;
    }
}
