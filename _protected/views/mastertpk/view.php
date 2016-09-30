<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MasterTpk */

$this->title = $model->KDTPK;
$this->params['breadcrumbs'][] = ['label' => 'Master Tpks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-tpk-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->KDTPK], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->KDTPK], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'KDTPK',
            'NO_FKTP',
            'NAMA_TPK',
            'NAMA_FKTP',
            'ALAMAT',
            'KOTA',
            'AREA',
            'STATUS',
            'TGL_MULAI_PKS',
            'TGL_AKHIR_PKS',
            'KETERANGAN',
        ],
    ]) ?>

</div>
