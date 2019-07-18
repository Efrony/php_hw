<?php

namespace app\controllers;

use app\model\Products;

class ProductsController extends Controller
{
    
    public function actionCatalog()
    {
        $productList = Products::getAll();
        echo $this->render('product', ['productList' => $productList]);
    }

    public function actionProduct()
    {
        $id = $_GET['id'];
        $productItem = Products::getOne($id);
        echo $this->render('product', ['productItem' => $productItem]);
    }


}
