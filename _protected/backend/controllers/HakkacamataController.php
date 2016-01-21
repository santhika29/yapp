<?php

namespace backend\controllers;

use Yii;
use backend\models\HakKacamata;


/**
* HakkacamataController .
 */
class HakkacamataController extends \yii\web\Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}
