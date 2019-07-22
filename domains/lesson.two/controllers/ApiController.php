<?php

namespace app\controllers;

use app\model\Products;

class ApiController extends Controller
{
    public function actionShowmore()
    {
        $data = json_decode(file_get_contents('php://input'));
        $fromProduct = $data->fromProduct;
        $countProduct = $data->countProduct;   
        $productList = Products::getLimit($fromProduct, $countProduct);
        $catalog = $this->renderTemplates('catalog', ['productList' => $productList]);
        header("Content-type: text/html; charset=utf-8;");
        echo $catalog;
        die;
    }
}
