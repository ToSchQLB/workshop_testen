<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\TicketStatusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-status-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'crus') ?>

    <?= $form->field($model, 'crti') ?>

    <?= $form->field($model, 'upus') ?>

    <?php // echo $form->field($model, 'upti') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ticket', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('ticket', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
