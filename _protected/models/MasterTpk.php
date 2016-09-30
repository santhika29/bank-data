<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_tpk".
 *
 * @property string $KDTPK
 * @property string $NO_FKTP
 * @property string $NAMA_TPK
 * @property string $NAMA_FKTP
 * @property string $ALAMAT
 * @property string $KOTA
 * @property integer $AREA
 * @property string $STATUS
 * @property string $TGL_MULAI_PKS
 * @property string $TGL_AKHIR_PKS
 * @property string $KETERANGAN
 */
class MasterTpk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_tpk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KDTPK'], 'required'],
            [['AREA'], 'integer'],
            [['KDTPK', 'NO_FKTP', 'STATUS'], 'string', 'max' => 12],
            [['NAMA_TPK', 'NAMA_FKTP', 'ALAMAT'], 'string', 'max' => 45],
            [['KOTA', 'TGL_MULAI_PKS', 'TGL_AKHIR_PKS', 'KETERANGAN'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KDTPK' => 'KODE TPK',
            'NO_FKTP' => 'NO FKTP',
            'NAMA_TPK' => 'NAMA TPK',
            'NAMA_FKTP' => 'NAMA FKTP',
            'ALAMAT' => 'ALAMAT TPK',
            'KOTA' => 'KOTA TPK',
            'AREA' => 'AREA TPK',
            'STATUS' => 'Status',
            'TGL_MULAI_PKS' => 'Tgl  Mulai  Pks',
            'TGL_AKHIR_PKS' => 'Tgl  Akhir  Pks',
            'KETERANGAN' => 'Keterangan',
        ];
    }
}
