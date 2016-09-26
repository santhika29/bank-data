<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Peserta */

$this->title = 'Update Peserta: ' . $model->nikkes;
$this->params['breadcrumbs'][] = ['label' => 'Pesertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nikkes, 'url' => ['view', 'id' => $model->nikkes]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peserta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
