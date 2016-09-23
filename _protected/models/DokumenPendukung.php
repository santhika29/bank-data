<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "dokumen_pendukung".
 *
 * @property integer $id
 * @property string $peserta_id
 * @property integer $uploaded_file_id
 * @property integer $tag_id
 * @property integer $created_at
 *
 * @property UploadedFile $uploadedFile
 * @property Tag $tag
 * @property Peserta $peserta
 */
class DokumenPendukung extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dokumen_pendukung';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uploaded_file_id', 'tag_id', 'created_at'], 'integer'],
            [['peserta_id'], 'string', 'max' => 15],
            [['uploaded_file_id'], 'exist', 'skipOnError' => true, 'targetClass' => UploadedFile::className(), 'targetAttribute' => ['uploaded_file_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['tag_id' => 'id']],
            [['peserta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Peserta::className(), 'targetAttribute' => ['peserta_id' => 'nikkes']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'peserta_id' => 'Nikkes',
            'peserta' => 'Nama',
            'uploaded_file_id' => 'Uploaded File ID',
            'tag_id' => 'Jenis Dokumen',
            'created_at' => 'Created At',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => 'mdm\upload\UploadBehavior',
                'attribute' => 'file', // required, use to receive input file
                'savedAttribute' => 'uploaded_file_id', // optional, use to link model with saved file.
                'uploadPath' => 'uploads', // saved directory. default to '@runtime/upload'
                'autoSave' => true, // when true then uploaded file will be save before ActiveRecord::save()
                'autoDelete' => true, // when true then uploaded file will deleted before ActiveRecord::delete()
            ],
            [
            'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUploadedFile()
    {
        return $this->hasOne(UploadedFile::className(), ['id' => 'uploaded_file_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'tag_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeserta()
    {
        return $this->hasOne(Peserta::className(), ['nikkes' => 'peserta_id']);
    }
}
