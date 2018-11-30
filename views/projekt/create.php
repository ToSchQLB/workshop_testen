<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Projekt */

$this->title = Yii::t('projekt', 'Create Projekt');
$this->params['breadcrumbs'][] = ['label' => Yii::t('projekt', 'Projekts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projekt-create">

    <div class="box box-solid box-default">

        <div class="box-header"></div>
        <div class="box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>

    </div>

</div>
