<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TicketKategorie */

$this->title = Yii::t('ticket', 'Update Ticket Kategorie: {name}', [
    'name' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'Ticket Kategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('ticket', 'Update');
?>
<div class="ticket-kategorie-update">

    <div class="box box-default box-solid">
        <div class="box-header"></div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
