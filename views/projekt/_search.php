<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ProjektSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projekt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'beschreibung') ?>

    <?= $form->field($model, 'crus') ?>

    <?= $form->field($model, 'crti') ?>

    <?php // echo $form->field($model, 'upus') ?>

    <?php // echo $form->field($model, 'upti') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('projekt', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('projekt', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
