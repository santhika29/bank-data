<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DokumenPendukung */

$this->title = 'Update Dokumen Pendukung: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dokumen Pendukungs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dokumen-pendukung-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
