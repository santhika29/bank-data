<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTpk */

$this->title = 'Update Master Tpk: ' . $model->KDTPK;
$this->params['breadcrumbs'][] = ['label' => 'Master Tpks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->KDTPK, 'url' => ['view', 'id' => $model->KDTPK]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-tpk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
