<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['actions'][] = Html::a(Yii::t('ticket', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
$this->params['actions'][] = Html::a(Yii::t('ticket', 'Delete'), ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
        'method' => 'post',
    ],
]);
?>
<div class="ticket-view">

    <div class="box box-solid box-default">
        <div class="box-header"></div>
        <div class="box-body">
            <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'projekt.titel',
            'ticketKategorie.name',
            'titel',
            'beschreibung:ntext',
            'bearbeiter.name',
            'ticketStatus.name',
            'crti:datetime',
            'updateUser.name',
            'upti:datetime',
            'updateUser.name'
        ],
    ]) ?>
        </div>
    </div>

</div>
