<?php

namespace app\controllers;

use app\model\Comments;

class AboutController extends Controller
{
    public function actionDefault()
    {
        $commentsList = Comments::getAll();
        echo $this->render('about', [
            'commentsList' => $commentsList,
        ]);
    }
}
