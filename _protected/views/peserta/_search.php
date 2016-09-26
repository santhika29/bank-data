<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\PesertaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peserta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nikkes') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'band') ?>

    <?= $form->field($model, 'tgl_lahir') ?>

    <?php // echo $form->field($model, 'tgl_pensiun') ?>

    <?php // echo $form->field($model, 'tanggungan') ?>

    <?php // echo $form->field($model, 'tgl_akhir_tanggungan') ?>

    <?php // echo $form->field($model, 'tpk') ?>

    <?php // echo $form->field($model, 'area') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
