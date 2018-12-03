<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('ticket', 'Tickets');
$this->params['breadcrumbs'][] = $this->title;

$this->params['actions'][] = Html::a(
        Yii::t('ticket', 'Create Ticket'),
        ['create'],
        ['class' => 'btn btn-success']
);
?>
<div class="ticket-index">

    <div class="box box-default box-solid">
        <div class="box-header"></div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'projekt.titel',
                    'ticketKategorie.name',
                    'titel',
                    'bearbeiter.name',
                    'ticketStatus.name',
                    'createUser.name',
                    'crti',
                    'upti',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>


</div>
