<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\MastertpkSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-tpk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'KDTPK') ?>

    <?= $form->field($model, 'NO_FKTP') ?>

    <?= $form->field($model, 'NAMA_TPK') ?>

    <?= $form->field($model, 'NAMA_FKTP') ?>

    <?= $form->field($model, 'ALAMAT') ?>

    <?php // echo $form->field($model, 'KOTA') ?>

    <?php // echo $form->field($model, 'AREA') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <?php // echo $form->field($model, 'TGL_MULAI_PKS') ?>

    <?php // echo $form->field($model, 'TGL_AKHIR_PKS') ?>

    <?php // echo $form->field($model, 'KETERANGAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
