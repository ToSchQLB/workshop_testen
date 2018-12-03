<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ticket */

$this->title = Yii::t('ticket', 'Create Ticket');
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'Tickets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-create">

    <div class="box box-solid box-default">
        <div class="box-header"></div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
