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
            'masuk' => ['type'=> 'varchar', 'constraint' => 20],
            'lulus' => ['type' => 'varchar', 'constraint' => 20],
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
