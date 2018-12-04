<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ticket */

$this->title = Yii::t('ticket', 'Update Ticket: {name}', [
    'name' => '' . $model->titel .' ('. $model->id .')',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('ticket', 'Update');
?>
<div class="ticket-update">

    <div class="box box-solid box-default">
        <div class="box-header"></div>
        <div class="box-body">
            <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
        </div>
    </div>

</div>
