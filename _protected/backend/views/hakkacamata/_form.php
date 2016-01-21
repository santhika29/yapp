<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HakKacamata */
/* @var $form ActiveForm */
?>
<div class="hak-kacamata">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'hak_kacamata') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- hak-kacamata -->
