<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content-wrapper" style="padding-top: 40px;">

    <section class="content-header">
        <div style="float: left; margin-right: 15px; min-width: calc(16.67% - 10px)">
            <?php if (isset($this->blocks['content-header'])) { ?>
                <h1 style="margin: 0; font-size: 30px;"><?= $this->blocks['content-header'] ?></h1>
            <?php } else { ?>
                <h1 style="margin: 0; font-size: 30px;">
                    <?php
                    if ($this->title !== null) {
                        echo \yii\helpers\Html::encode($this->title);
                    } else {
                        echo \yii\helpers\Inflector::camel2words(
                            \yii\helpers\Inflector::id2camel($this->context->module->id)
                        );
                        echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                    } ?>
                </h1>
            <?php } ?>
        </div>
        <div style="min-height: 30px">
            <?= empty($this->params['actions']) ? '' : implode(' ', $this->params['actions']) ?>
        </div>
        <?=
        Breadcrumbs::widget(
            [
                'links'   => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => [
                    'style' => 'float: none; border-bottom: 1px solid #222d32; position: static; width: 100%;',
                    'class' => 'breadcrumb'
                ]
            ]
        ) ?>
        <div style="clear: both"></div>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>

    <section class="search-results" style="display: none">

    </section>
</div>

<footer class="main-footer">

</footer>