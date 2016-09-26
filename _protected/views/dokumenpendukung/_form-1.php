<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\Tag;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\DokumenPendukung */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dokumen-pendukung-form">

    <?php $form = ActiveForm::begin( ); ?>

    <?= $form->field($model, 'peserta_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tag_id')->dropDownList(
    	ArrayHelper::map(Tag::find()->all(),'id','name'), ['prompt' => 'Pilih Jenis Dokumen']
    ) ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*, application/pdf'],
        'pluginOptions' =>[
            'showUpload' => false,
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
