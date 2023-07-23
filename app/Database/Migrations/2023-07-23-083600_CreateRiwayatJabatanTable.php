<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRiwayatJabatanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true, 'auto_increment'=> true],  
            'pengguna_id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true],
            'nama' => ['type' => 'varchar', 'constraint' => 100],
            'awal' => ['type'=> 'varchar', 'constraint' => 10],
            'akhir' => ['type' => 'varchar', 'constraint' => 10],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('riwayat_jabatan');
    }

    public function down()
    {
        $this->forge->dropTable('riwayat_jabatan');
    }
}
