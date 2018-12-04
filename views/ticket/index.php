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

                    [
                        'attribute' => 'projekt.name',
                        'filter'    => \kartik\select2\Select2::widget([
                            'data' => \app\models\Projekt::allArray(),
                            'model' => $searchModel,
                            'attribute' => 'projekt.name',
                            'options' => [
                                'multiple' => true
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]
                        ])
                    ],
                    [
                        'attribute' => 'ticketKategorie.name',
                        'filter'    => \kartik\select2\Select2::widget([
                            'data' => \app\models\TicketKategorie::allArray(),
                            'model' => $searchModel,
                            'attribute' => 'ticketKategorie.name',
                            'options' => [
                                'multiple' => true
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]
                        ])
                    ],
                    'titel',
                    [
                        'attribute' => 'bearbeiter.name',
                        'filter'    => \kartik\select2\Select2::widget([
                            'data' => \app\models\User::allArray(),
                            'model' => $searchModel,
                            'attribute' => 'bearbeiter.name',
                            'options' => [
                                'multiple' => true
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]
                        ])
                    ],
                    [
                        'attribute' => 'ticketStatus.name',
                        'filter'    => \kartik\select2\Select2::widget([
                            'data' => \app\models\TicketStatus::allArray(),
                            'model' => $searchModel,
                            'attribute' => 'ticketStatus.name',
                            'options' => [
                                'multiple' => true
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]
                        ]),
                    ],
                    [
                        'attribute' => 'createUser.name',
                        'filter'    => \kartik\select2\Select2::widget([
                            'data' => \app\models\User::allArray(),
                            'model' => $searchModel,
                            'attribute' => 'createUser.name',
                            'options' => [
                                'multiple' => true
                            ],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]
                        ])
                    ],
                    'crti:datetime',
                    'upti:datetime',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>


</div>
