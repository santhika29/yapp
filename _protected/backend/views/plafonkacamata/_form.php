<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PlafonKacamata */
/* @var $form ActiveForm */
?>
<div class="plafon-kacamata">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'status_peserta_id') ?>
        <?= $form->field($model, 'hak_kacamata_id') ?>
        <?= $form->field($model, 'band') ?>
        <?= $form->field($model, 'biaya') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- plafon-kacamata -->
