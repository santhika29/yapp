<?php

namespace backend\controllers;

use Yii;
use backend\models\PlafonKacamata;


/**
* PlafonkacamataController .
 */
class PlafonkacamataController extends \yii\web\Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}
