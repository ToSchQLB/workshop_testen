<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProjektSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('projekt', 'Projekts');
$this->params['breadcrumbs'][] = $this->title;

$this->params['actions'][] = Html::a(Yii::t('projekt', 'Create Projekt'), ['create'], ['class' => 'btn btn-success'])
?>
<div class="projekt-index">

    <div class="box box-default box-solid">
        <div class="box-header"></div>
        <div class="box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    [
                            'attribute' => 'createUser.name',
                            'filter' => \kartik\widgets\Select2::widget([
                                    'model' => $searchModel,
                                    'attribute' => 'createUser.name',
                                    'data' => \app\models\User::allArray(),
                                    'options' => [
                                        'multiple' => true
                                    ],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ]
                            ])
                    ],
                    'crti:date',
                    'upti:date',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
