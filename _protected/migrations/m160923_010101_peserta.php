<?php

use yii\db\Schema;

class m160923_010101_peserta extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('peserta', [
            'nik' => $this->string(10)->notNull(),
            'nikkes' => $this->string(15)->notNull(),
            'nama' => $this->string(255)->notNull(),
            'band' => $this->string(10),
            'tgl_lahir' => $this->date(),
            'tgl_pensiun' => $this->date(),
            'tanggungan' => $this->string(255),
            'tgl_akhir_tanggungan' => $this->date(),
            'tpk' => $this->string(255),
            'area' => $this->string(255),
            'PRIMARY KEY ([[nikkes]])',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('peserta');
    }
}
