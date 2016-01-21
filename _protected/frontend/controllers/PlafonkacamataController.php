<?php

namespace frontend\controllers;

use backend\models\PlafonKacamata;
use yii\helpers\Json;

class PlafonkacamataController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetDataPlafon($hak_kacamata_id,$band = null ,$status_peserta_id = null)
    {
        $dataPlafon = PlafonKacamata::find()
        			->where(['hak_kacamata_id'=>$hak_kacamata_id])
        			->andWhere(['band'=>$band])
        			->andWhere(['status_peserta_id'=>$status_peserta_id])
        			->one();
        echo Json::encode($dataPlafon);
    }

}
