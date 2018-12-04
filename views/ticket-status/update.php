<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TicketStatus */

$this->title = Yii::t('ticket', 'Update Ticket Status: {name}', [
    'name' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'Ticket Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('ticket', 'Update');
?>
<div class="ticket-status-update">

    <div class="box box-default box-solid">
        <div class="box-header"></div>
        <div class="box-body">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div>
    </div>

</div>
