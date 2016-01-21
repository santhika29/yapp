<?php

namespace frontend\controllers;

use backend\models\Peserta;
use backend\models\search\PesertaSearch;
use yii\helpers\Json;
use yii\db\Query;

class PesertaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetDataPeserta($nikkes)
    {
        $dataPeserta = Peserta::find()->where(['nikkes'=>$nikkes])->one();
        echo Json::encode($dataPeserta);
    }

    public function actionGetNikkesList($q = null)
    {
    	$query = new Query;

    	$query -> select('nikkes')
    		   -> from('peserta')
    		   -> where('nikkes LIKE "%' . $q .'%"')
    		   -> orderby('nikkes');

    	$command = $query->createCommand();
    	$data = $command->queryAll();

    	foreach ($data as $d) {
    		# code...
    		$out[] = ['value' => $d['nikkes']];
    	}

    	echo Json::encode($out);
    }

}
