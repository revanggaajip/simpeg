<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRiwayatPendidikanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true, 'auto_increment'=> true],  
            'pengguna_id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true],
            'nama' => ['type' => 'varchar', 'constraint' => 100],
            'awal' => ['type'=> 'date'],
            'akhir' => ['type' => 'date'],
            'tingkatan' => ['type' => 'varchar', 'constraint' => 25]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('riwayat_pendidikan');
    }

    public function down()
    {
        $this->forge->dropTable('riwayat_pendidikan');
    }
}
