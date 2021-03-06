<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TicketKategorie */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'Ticket Kategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['actions'][] = Html::a(
        Yii::t('ticket', 'Update'),
        ['update', 'id' => $model->id],
        ['class' => 'btn btn-primary']
);
$this->params['actions'][] = Html::a(
        Yii::t('ticket', 'Delete'),
        ['delete', 'id' => $model->id],
        [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('ticket', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]
);
?>
<div class="ticket-kategorie-view">

    <div class="box box-default box-solid">
        <div class="box header"></div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'beschreibung:ntext',
                    'createUser.name',
                    'crti:datetime',
                    'updateUser.name',
                    'upti:datetime',
                ],
            ]) ?>
        </div>
    </div>

</div>
