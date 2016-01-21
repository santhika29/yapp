<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PesertaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peserta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nikkes') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nama_kk') ?>

    <?= $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'band') ?>

    <?php // echo $form->field($model, 'status_peserta_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
