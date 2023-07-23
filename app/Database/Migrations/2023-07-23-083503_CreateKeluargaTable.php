<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKeluargaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true, 'auto_increment'=> true],  
            'pengguna_id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true],
            'nama' => ['type' => 'varchar', 'constraint' => 150],
            'tanggal_lahir' => ['type'=> 'date'],
            'hubungan' => ['type' => 'varchar', 'constraint' => 100],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('keluarga');
    }

    public function down()
    {
        $this->forge->dropTable('keluarga');
    }
}
