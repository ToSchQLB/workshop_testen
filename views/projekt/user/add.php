<?php
/**
 * Created by PhpStorm.
 * User: Toni.Schreiber
 * Date: 03.12.2018
 * Time: 14:13
 */

use yii\web\View;
use app\defaults\ActiveForm;
use app\models\ProjektUser;

/** @var $this View*/
/** @var $model ProjektUser */
?>

<?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'user_id')
            ->widget(
        \kartik\widgets\Select2::className(),
    [
        'data' => \app\models\User::allArray(),
        'options' => ['placeholder' => '...'],
    ]) ?>

    <?= $form->field($model, 'rolle')
            ->dropDownList(ProjektUser::roleNames())
    ?>

    <?= \yii\helpers\Html::submitButton() ?>

<?php ActiveForm::end() ?>


