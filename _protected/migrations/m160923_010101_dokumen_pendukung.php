<?php

use yii\db\Schema;

class m160923_010101_dokumen_pendukung extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('dokumen_pendukung', [
            'id' => $this->primaryKey(),
            'peserta_id' => $this->string(15),
            'uploaded_file_id' => $this->integer(11),
            'tag_id' => $this->integer(11),
            'created_at' => $this->integer(11),
            'FOREIGN KEY ([[uploaded_file_id]]) REFERENCES uploaded_file ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[tag_id]]) REFERENCES tag ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[peserta_id]]) REFERENCES peserta ([[nikkes]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('dokumen_pendukung');
    }
}
