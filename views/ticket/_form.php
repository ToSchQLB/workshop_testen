<?php

use yii\helpers\Html;
use app\defaults\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'projekt_id')->widget(
            \kartik\widgets\Select2::className(),
            [
                'data' => \app\models\Projekt::allArray(),
                'options' => ['placeholder' => '...'],
            ]
    ) ?>

    <?= $form->field($model, 'ticket_kategorie_id')->widget(
        \kartik\widgets\Select2::className(),
        [
            'data' => \app\models\TicketKategorie::allArray(),
            'options' => ['placeholder' => '...'],
        ]
    ) ?>

    <?= $form->field($model, 'titel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'beschreibung')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bearbeiter_id')->widget(
        \kartik\widgets\Select2::className(),
        [
            'data' => \app\models\User::allArray(),
            'options' => ['placeholder' => '...'],
        ]
    ) ?>

    <?= $form->field($model, 'ticket_status_id')->widget(
        \kartik\widgets\Select2::className(),
        [
            'data' => \app\models\TicketStatus::allArray(),
            'options' => ['placeholder' => '...'],
        ]
    ) ?>

</div>
<div class="box-header">

    <div class="col-md-offset-2">
        <div class="form-group" style="margin: 0">
            <?= Html::submitButton(Yii::t('ticket', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
