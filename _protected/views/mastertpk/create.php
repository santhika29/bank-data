<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MasterTpk */

$this->title = 'Create Master Tpk';
$this->params['breadcrumbs'][] = ['label' => 'Master Tpks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-tpk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
