<?php

use kartik\helpers\Html;
use kartik\grid\GridView;
use kartik\icons\Icon;
use yii\helpers\Url;
use frontend\models\MonitoringKacamata;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\MonitoringKacamataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */



$this->title = 'Monitoring Kacamata';
$this->params['breadcrumbs'][] = $this->title;

Icon::Map($this, Icon::FA);
?>
<div class="monitoringkacamata-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php 
    //echo $this->render('_search', ['model' => $searchModel]); 

        $gridColumns = [
            [
                'class' => 'kartik\grid\SerialColumn',
                'contentOptions' => ['class' => 'kartik-sheet-style'],
                'header' => '#',
                'width' => '36px',
                'headerOptions' => ['class' => 'kartik-sheet-style']
            ],

            [
                'attribute' => 'nikkes',
                'width' => '15%',
            ],

            [
                'attribute' => 'nikkes0',
                'value' => 'nikkes0.nama',
            ],

            [
                'attribute' => 'hak_kacamata_id',
                'value' => function($model, $key, $index, $widget){
                    return '<code>'. $model->hakKacamata->hak_kacamata .'</code>';
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => MonitoringKacamata::getHakKacamataList(),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Hak Kacamata'],
                'vAlign' => 'middle',
                'format' => 'raw',
                'width' => '10%',
            ],
            
            [
                //'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'tgl_ambil',
                'filterType' => GridView::FILTER_DATE,

                'filterWidgetOptions' => [
                    'options' => ['placeholder' => 'Enter date ...'], 
                    'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                    'removeButton' => false,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ],
                ],
                'width' => '20%',
                'format' => 'date',
            ],
            //'created_at',
            // 'updated_at',
            // 'created_by',

            [
                'class' => 'kartik\grid\ActionColumn',
                //'hidden' => true,
            ],
        ];
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'headerRowOptions' => ['class' => 'active'],
        'filterRowOptions' => ['class' => 'active'],
        'pjax' => true,
        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-large"></i> Monitoring Kacamata</h3>',
            'type' => GridView::TYPE_PRIMARY,
        ],
        //set the toolbar
        'toolbar' => [
            ['content' =>
                Html::button(Icon::show('plus'),[
                    'type' => 'button', 
                    'title' => 'Add Monitoring Kacamata',
                    'class' => 'btn btn-success',
                    'onClick' => 'location.href=window.location.href + "/create"',
                    ]).''.
                Html::a(Icon::show('repeat'),['/monitoringkacamata'],['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset'])
            ],
            '{toggleData}',
        ],
        'hover' => true,
        'bordered' => true,
        'condensed' => true,
        'striped' => false,
        'responsive' => true,
    ]); ?>
</div>