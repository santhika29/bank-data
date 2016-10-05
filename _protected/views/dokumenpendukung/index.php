<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Tag;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\DokumenpendukungSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$typeList = ArrayHelper::map(Tag::find()->asArray()->all(), 'id', 'name');

$this->title = 'Dokumen Pendukung';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokumen-pendukung-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <!--
    <p>
        <?= Html::a('Create Dokumen Pendukung', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'toolbar'=> [
            ['content'=>
                Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                    'type'=>'button', 
                    'title' => 'Add Book', 
                    'class'=>'btn btn-success'
                    ]) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=> 'Reset Grid'])
            ],
        '{export}',
        '{toggleData}',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'peserta_id',
            [
                'attribute' => 'peserta',
                'value' => 'peserta.nama',
            ],
            [   
                'attribute' => 'tag_id', 
                'filter' => $typeList, 
                'label' => 'Jenis Dokumen', 
                'value' => function ($model, $index, $widget) { return $model->tag->name; }
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
