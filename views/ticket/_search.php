<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\TicketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'projekt_id') ?>

    <?= $form->field($model, 'ticket_kategorie_id') ?>

    <?= $form->field($model, 'titel') ?>

    <?= $form->field($model, 'beschreibung') ?>

    <?php // echo $form->field($model, 'bearbeiter_id') ?>

    <?php // echo $form->field($model, 'ticket_status_id') ?>

    <?php // echo $form->field($model, 'crus') ?>

    <?php // echo $form->field($model, 'crti') ?>

    <?php // echo $form->field($model, 'upus') ?>

    <?php // echo $form->field($model, 'upti') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('ticket', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('ticket', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
