<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTpk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-tpk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'KDTPK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NO_FKTP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAMA_TPK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAMA_FKTP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ALAMAT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KOTA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AREA')->textInput() ?>

    <?= $form->field($model, 'STATUS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TGL_MULAI_PKS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TGL_AKHIR_PKS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KETERANGAN')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
