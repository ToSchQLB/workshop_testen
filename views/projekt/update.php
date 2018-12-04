<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Projekt */

$this->title = Yii::t('projekt', 'Update Projekt: {name}', [
    'name' => '' . $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('projekt', 'Projekts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('projekt', 'Update');
?>
<div class="projekt-update">

    <div class="box box-solid box-default">

        <div class="box-header"></div>
        <div class="box-body">
            <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
        </div>
    </div>

</div>
