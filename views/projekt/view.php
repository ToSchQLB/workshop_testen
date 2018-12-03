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
                                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
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
                    'createUser.name',
                    'upti:datetime',
                    'updateUser.name'
                ],
            ]) ?>
        </div>
    </div>

</div>

<div class="box box-default box-solid">
    <div class="box-header">
        <h3 class="box-title"><?= Yii::t('projekt','Projektnutzer') ?>
            <?= Html::a(
                    Yii::t('projekt', 'add'),
                    ['projekt/user-add', 'projekt' => $model->id],
                    ['class' => 'btn btn-success']
            ) ?>
        </h3>
    </div>
    <div class="box-body">
        <?=
            \yii\grid\GridView::widget([
                'dataProvider' => new \yii\data\ArrayDataProvider([
                        'allModels' => $model->projektUsers,
                        'keys' => ['projekt_id','user_id']
                ]),
                'columns' => [
                    'user.name',
                    [
                        'attribute' => 'rolle',
                        'value' => function($model){
                            return \app\models\ProjektUser::getRoleName($model->rolle);
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}',
                        'urlCreator' => function($action, $model, $key, $index, $ac){
                            return \yii\helpers\Url::to([
                                    'projekt/user-'.$action,
                                    'projekt'=>$model->projekt_id,
                                    'user' => $model->user_id
                                ]
                            );
                        }

                    ]
                ]
            ])
        ?>
    </div>
</div>


