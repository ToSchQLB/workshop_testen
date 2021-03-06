<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TicketKategorieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('ticket', 'Ticket Kategories');
$this->params['breadcrumbs'][] = $this->title;

$this->params['actions'][] = Html::a(
        Yii::t('ticket', 'Create Ticket Kategorie'),
        ['create'],
        ['class' => 'btn btn-success']
);
?>
<div class="ticket-kategorie-index">

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
