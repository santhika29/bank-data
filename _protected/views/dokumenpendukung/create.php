<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DokumenPendukung */

$this->title = 'Create Dokumen Pendukung';
$this->params['breadcrumbs'][] = ['label' => 'Dokumen Pendukungs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokumen-pendukung-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
