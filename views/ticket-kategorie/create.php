<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TicketKategorie */

$this->title = Yii::t('ticket', 'Create Ticket Kategorie');
$this->params['breadcrumbs'][] = ['label' => Yii::t('ticket', 'Ticket Kategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-kategorie-create">

    <div class="box box-default box-solid">
        <div class="box-header"></div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
