<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\MastertpkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master TPK';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-tpk-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['enablePushState' => false,]],
        'responsive'=>true,
        'containerOptions'=>['style'=>'overflow: auto'],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            //'KDTPK',
            //'NO_FKTP',
            'NAMA_TPK',
            //'NAMA_FKTP',
            'ALAMAT',
            'KOTA',
            // 'AREA',
            // 'STATUS',
            // 'TGL_MULAI_PKS',
            // 'TGL_AKHIR_PKS',
            // 'KETERANGAN',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'panel'=>['type'=>'primary', 'heading'=>'<h4>Master TPK</h4>'],
        'toolbar'=> [
            [
                'content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],[
                        'title'=> 'Create Master TPK', 
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
</div>
