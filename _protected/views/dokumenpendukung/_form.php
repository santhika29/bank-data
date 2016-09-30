<?php
use app\models\Tag;
use app\models\Peserta;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;

use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;

$form = ActiveForm::begin([
            'options'=>[
                'enctype'=>'multipart/form-data'], // important
                'id' => 'tambah-model',
            ]);
            echo   $form->field($model, 'peserta_id')->hiddenInput(['value'=> $kode])->label(false);

            //tampilkan data selain foto
            if ($stat == '1')
            {
                echo $form->field($model, 'tag_id')->dropDownList(
                    ArrayHelper::map(Tag::find()
                        ->where(['<','id','5'])
                        ->andWhere(['status' => Peserta::statusPeserta($kode)])
                        ->orWhere(['status' => '30'])
                        ->all(),'id','name'), ['prompt' => 'Pilih Jenis Dokumen']
                    );
                $dok = 'application/pdf';
            }else{
                echo   $form->field($model, 'tag_id')->hiddenInput(['value'=> '5'])->label(false);
                $dok = 'image/*';
            }

            echo $form->field($model, 'file')->widget(FileInput::classname(), [
                'options' => ['accept' => $dok],
                'pluginOptions' =>[
                    'showUpload' => false,
                ]
            ]);
            ?>
            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
            </div>
            <?php
        ActiveForm::end();