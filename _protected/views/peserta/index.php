<?php

use yii\helpers\Html;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PesertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Peserta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peserta-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'responsive'=>false,
        'containerOptions'=>['style'=>'overflow: auto'],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'nik',
            'nikkes',
            'nama',
            'band',
            [
                'attribute' => 'tgl_lahir',
                'format' => 'date',
            ],
            // 'tgl_pensiun',
            // 'tanggungan',
            // 'tgl_akhir_tanggungan',
            'tpk',
            'area',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'panel'=>['type'=>'primary', 'heading'=>'<h4>Peserta</h4>'],
        'toolbar'=> [
            [
                'content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],[
                        'title'=> 'Create Peserta', 
                        'class'=>'btn btn-success'
                    ]) . ' '.
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                        'data-pjax'=>0, 
                        'class'=>'btn btn-default', 
                        'title'=> 'Reset'
                    ]),
                'options' => ['class' => 'btn-group-md'],
            ]
        ]
    ]); ?>
