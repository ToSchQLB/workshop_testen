<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TicketKategorie */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beschreibung')->textarea(['rows' => 6]) ?>

</div>
<div class="box-header">
    <div class="col-md-offset-2">
        <div class="form-group" style="margin: 0;">
            <?= Html::submitButton(Yii::t('ticket', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
