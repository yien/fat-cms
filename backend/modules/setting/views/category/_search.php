<?php

use \kartik\form\ActiveForm;
?>

<div class="box box-default">
    <?php $form = ActiveForm::begin(
            [
                    'method' => 'get',
                'type' => ActiveForm::TYPE_INLINE,
                'formConfig' => [
                     'showLabels' => true,
                    'labelSpan' => 2
                ],
                'fieldConfig' => ['autoPlaceholder'=>true]
            ]
    );?>
    <div class="box-body">
        <?= $form->field($searchModel, 'name')->textInput();?>
        <?= $form->field($searchModel, 'slug')->textInput();?>
        <?= \kartik\helpers\Html::submitButton('搜索', ['class' => Yii::$app->params['btnStyle']]) ?>
    </div>
    <?php ActiveForm::end();?>
</div>
