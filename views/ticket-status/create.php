<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TicketStatus */

$this->title = Yii::t('ticket', 'Create Ticket Status');
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'Ticket Statuses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-status-create">

    <div class="box box-default box-solid">
        <div class="box-header"></div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
