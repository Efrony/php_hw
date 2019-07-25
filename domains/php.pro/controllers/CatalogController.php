<?php

namespace app\controllers;

use app\model\Products;
use app\model\Comments;


class CatalogController extends Controller
{
    public function actionDefault()
    {
        $productList = Products::getLimit(0, 20);
        $catalog = $this->renderTemplates('catalog', ['productList' => $productList]);
        
        echo $this->render('women', ['catalog' => $catalog]);
    }

    public function actionProduct()
    {
        $id = $_GET['id'];
        $productItem = Products::getOne($id);
        $productItem->rating++;
        $productItem->update();
        
        $productList = Products::getLimit(0, 4);
        $commentsList = Comments::getWhere('id_product', $id);
        $catalog = $this->renderTemplates('catalog', ['productList' => $productList]);

        echo $this->render('product', [
            'productItem' => $productItem,
            'commentsList' => $commentsList,
            'catalog' => $catalog,
        ]);
    }
}
