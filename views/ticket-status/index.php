<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TicketStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('ticket', 'Ticket Statuses');
$this->params['breadcrumbs'][] = $this->title;

$this->params['actions'][] = Html::a(
        Yii::t('ticket', 'Create Ticket Status'),
        ['create'],
        ['class' => 'btn btn-success']
);
?>
<div class="ticket-status-index">

    <div class="box box-solid box-default">
        <div class="box-header"></div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    'createUser.name',
                    'crti:datetime',
                    'upti:datetime',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>


</div>
