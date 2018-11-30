<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Projekt */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('projekt', 'Projekts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['actions'][] = Html::a(Yii::t('projekt', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
$this->params['actions'][] = Html::a(Yii::t('projekt', 'Delete'), ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => Yii::t('projekt', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ]);
 ?>
<div class="projekt-view">

    <div class="box box-solid box-default">
        <div class="box-header"></div>
        <div class="box-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    'beschreibung:ntext',
                    'crti:datetime',
                    'updateUser.name',
                    'upti:datetime',
                    'updateUser.name'
                ],
            ]) ?>
        </div>
    </div>

</div>
