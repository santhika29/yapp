<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\monitoringkacamata */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Monitoring Kacamata', 'url' => ['/monitoringkacamata']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="monitoringkacamata-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        $attributes = [
            'nikkes',
            [
                'attribute' => 'hak_kacamata_id',
                'format' => 'raw',
                'value' => '<code>'. $model->hakKacamata->hak_kacamata .'</code>',
                'displayOnly' => true,
            ],
            'tgl_ambil',
            'created_at',
            'updated_at',
            'created_by',
        ];
    ?>
    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
        'hover'=>true,
        'striped' => false,
        'mode'=>DetailView::MODE_VIEW,
        'panel'=>[
            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-th-large"></i> Monitoring Kacamata</h3>',
            'type'=>DetailView::TYPE_SUCCESS,
        ],
        'attributes' => $attributes,
        'deleteOptions'=>[ // your ajax delete parameters
            'params' => ['id' => $model->id, 'kvdelete'=>true],
        ],
        //'formOptions' => ['action' => Url::current(['#' => '/monitoringkacamata/delete'])] // your action to delete
    ]) ?>

</div>
