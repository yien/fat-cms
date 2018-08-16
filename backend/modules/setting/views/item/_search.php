<?php

use \kartik\form\ActiveForm;
use kartik\select2\Select2;
use common\models\SettngCategory;
?>

<div class="box box-default">
    <?php $form = ActiveForm::begin(
        [
            'method' => 'get',
            'type' => ActiveForm::TYPE_INLINE,
            'formConfig' => [
                'showLabels' => false,
                'labelSpan' => 3
            ],
            'fieldConfig' => ['autoPlaceholder'=>true]
        ]
    );?>
    <div class="box-body">
        <?= $form->field($searchModel,'cate_id')->widget(Select2::className(), [
            'data' => SettngCategory::getOptions(),
            'theme' => Select2::THEME_DEFAULT,
            'pluginOptions' => [
                'allowClear' => true,
            ],
            'options' => [
                'prompt' => '全部配置组'
            ]
        ]);?>
        <?= $form->field($searchModel, 'name')->textInput();?>
        <?= $form->field($searchModel, 'slug')->textInput();?>

        <?= \kartik\helpers\Html::submitButton('搜索', ['class' => Yii::$app->params['btnStyle']]) ?>
    </div>
    <?php ActiveForm::end();?>
</div>
