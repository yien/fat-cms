<?php

use yii\helpers\Html;
use \kartik\form\ActiveForm;
use \kartik\select2\Select2;
use kartik\switchinput\SwitchInput;
use \common\models\SettngCategory;
?>

<div class="box box-solid box-default">
    <?php $form = ActiveForm::begin([
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'formConfig' => [
                    'labelSpan' => 1,
                ]
            ]);?>
    <div class="box-body">
        <?= $form->field($model, 'pid')->widget(Select2::className(), [
                'data' => SettngCategory::getTopCateMap(),
                'theme' => Select2::THEME_DEFAULT,
                'pluginOptions' => [
                    'allowClear' => true,
                ],
                'options' => [
                     'prompt' => '顶级分组'
                ]
        ]);?>
        <?= $form->field($model, 'name')->textInput();?>
        <?= $form->field($model, 'slug')->textInput();?>
        <?= $form->field($model, 'status')->widget(SwitchInput::class,[
                'type' => SwitchInput::CHECKBOX,
                'containerOptions' => [
                        'class' => ''
                ],
        ]);?>
        <?= $form->field($model, 'sort_id')->textInput();?>
    </div>

    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '编辑', ['class' => 'btn btn-primary btn-flat']) ?>
    </div>
    <?php \kartik\form\ActiveForm::end();?>
</div>
