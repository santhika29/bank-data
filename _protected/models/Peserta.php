<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peserta".
 *
 * @property string $nik
 * @property string $nikkes
 * @property string $nama
 * @property string $band
 * @property string $tgl_lahir
 * @property string $tgl_pensiun
 * @property string $tanggungan
 * @property string $tgl_akhir_tanggungan
 * @property string $tpk
 * @property string $area
 *
 * @property DokumenPendukung[] $dokumenPendukungs
 */
class Peserta extends \yii\db\ActiveRecord
{
    
    const ORTU = 10;
    const ANAK = 20;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik', 'nikkes', 'nama'], 'required'],
            [['tgl_lahir', 'tgl_pensiun', 'tgl_akhir_tanggungan'], 'safe'],
            [['nik', 'band'], 'string', 'max' => 10],
            [['nikkes'], 'string', 'max' => 15],
            [['nama', 'tanggungan', 'tpk', 'area'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nik' => 'NIK',
            'nikkes' => 'NIKKES',
            'nama' => 'Nama',
            'band' => 'BAND',
            'tgl_lahir' => 'TANGGAL LAHIR',
            'tgl_pensiun' => 'TANGGAL PENSIUN',
            'tanggungan' => 'TANGGUNGAN',
            'tgl_akhir_tanggungan' => 'TANGGAL AKHIR TANGGUNGAN',
            'tpk' => 'TPK',
            'area' => 'AREA',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenPendukungs()
    {
        return $this->hasMany(DokumenPendukung::className(), ['peserta_id' => 'nikkes']);
    }
    public function statusPeserta($nikkes)
    {
        if ((intval(substr($nikkes, 7)) == 0 ) || (fmod(substr($nikkes, 7), 100) == 0)) {
            return self::ORTU;
        } else {
            return self::ANAK;
        }
    }
}
