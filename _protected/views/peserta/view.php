<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;


use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\datecontrol\DateControl;



/* @var $this yii\web\View */
/* @var $model app\models\Peserta */

$this->title = $model->nikkes;
$this->params['breadcrumbs'][] = ['label' => 'Peserta', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-view">
    <div class="row">
    <div class="col-md-8">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nik',
                'nikkes',
                'nama',
                'band',
                [
                    'attribute' => 'tgl_lahir',
                    'format' => 'date',
                ],
                [
                    'attribute' => 'tgl_pensiun',
                    'format' => 'date',
                ],
                'tpk',
                'area',
            ],
        ]) ?>
    </div>
    <div class="col-md-4">
        <?php 
        $img =((!empty($foto)) ? $foto->filename : '');
        echo Yii::$app->thumbnail->img($img, [
            'thumbnail' => [
                'width' => 200,
                'height' => 200,
            ],
            'placeholder' => [
                'width' => 200,
                'height' => 200
            ]
        ]);
        if (empty($img)) {
            
            echo '</br>';
            echo Html::button('<i class="glyphicon glyphicon-camera"></i> Upload Foto', [
                'value' => Url::to(['dokumenpendukung/upload','id' => $model->nikkes,'stat'=>'2']), 
                'title' => 'Upload Foto', 
                'class' => 'showModalButton btn btn-success'
                ]);
        }
        ?>
    </div>
    </div>

    <div class="item panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title pull-left"><i class="glyphicon glyphicon-barcode"></i> Dokumen Pendukung</h3>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
        <div class="form-group">
        <?= Html::button('<i class="glyphicon glyphicon-plus"></i> Tambah Dokumen', [
            'value' => Url::to(['dokumenpendukung/upload','id' => $model->nikkes,'stat'=>'1']), 
            'title' => 'Tambah Dokumen', 
            'class' => 'showModalButton btn btn-success'
            ]); ?>
        </div>            
        <?= GridView::widget([
                'dataProvider' => $details,
                'columns' => [
                    ['class' => 'kartik\grid\SerialColumn'],
                    [   
                        'attribute' => 'tag_id',
                        'label' => 'Jenis Dokumen', 
                        'value' => function ($model, $index, $widget) { return $model->tag->name; }
                    ],
                    [   
                        'attribute' => 'uploaded_file_id',
                        'label' => 'Nama File', 
                        'value' => function ($model, $index, $widget) { return $model->uploadedFile->name; }
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => DateControl::FORMAT_DATE,
                    ],
                    
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{download}',
                        'buttons' => [
                            'download' => function($url,$model){
                                return Html::a(
                                    '<span class="glyphicon glyphicon-download"></span>',
                                    ['file/download', 'id' => $model->uploaded_file_id], 
                                    [
                                        'title' => 'Donwload',
                                        'target' => '_blank',
                                        'data-pjax' => '0',
                                    ]
                                );
                            },
                        ]
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

<?php
    Modal::begin([
        'headerOptions' => ['id' => 'modalHeader'],
        'header' =>'Tambah Dokumen',
        'id' => 'modal',
        'size' => 'modal-lg',
        //keeps from closing modal with esc key or by clicking out of the modal.
        // user must click cancel or X to close
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE],
        ]);
        echo "<div id='modalContent'></div>";
    Modal::end();
?>
