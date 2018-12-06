<?php
/**
 * Created by PhpStorm.
 * User: Toni.Schreiber
 * Date: 06.12.2018
 * Time: 15:50
 */

use app\defaults\ActiveForm;
use app\models\TicketStatus;

/**@var \yii\web\View $this */
/**@var \app\models\TicketHistorie $model */

$this->title = '';
?>



<?php $form = ActiveForm::begin() ?>
<div class="box box-default box-solid">
    <div class="box-header">
        <h3 class="box-title">
            <?= Yii::t('ticket','Historie hinzufügen') ?>
        </h3>
    </div>

    <div class="box-body">

        <?= $form->field($model, 'ticket_status_id')->widget(
            \kartik\select2\Select2::className(),
            [
                'data' => TicketStatus::allArray(),
                'options' => ['placeholder'=>'..'],
            ]
        ) ?>

        <?= $form->field($model, 'nachricht')->textarea() ?>

    </div>

    <div class="box-header">
        <div class="col-md-offset-2">
            <?= \yii\helpers\Html::submitButton('hinzufügen', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

</div>
<?php ActiveForm::end() ?>


