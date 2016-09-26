<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Yii::t('app', Yii::$app->name);
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang!</h1>

        <p class="lead">Bank Data Peserta YAKES TELKOM</p>
    </div>

    <?php if (!Yii::$app->user->isGuest) { ?>
    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h3>Data Peserta</h3>

                <p>Daftar data peserta beserta data dokumen pendukungnya.</p>

                <p><?= Html::a('Data Peserta &raquo;',['/peserta/index'],['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-6">
                <h3>Data Dokumen Pendukung</h3>

                <p>Daftar data dokumen pendukung yang telah ada di dalam bank data.</p>

                <p><?= Html::a('Data Dokumen Pendukung &raquo;',['/dokumenpendukung/index'],['class' => 'btn btn-default']) ?></p>
            </div>
            
        </div>

    </div>
    <?php }; ?>
</div>

