<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBerkasTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true, 'auto_increment'=> true],  
            'pengguna_id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true],
            'nama' => ['type' => 'varchar', 'constraint' => 255],
            'keterangan' => ['type' => 'text'],
            'created_at'    => [
                'type'          => 'DATETIME',
                'null'          => TRUE
            ],
            'updated_at'    => [
                'type'          => 'DATETIME',
                'null'          => TRUE
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('berkas');
    }

    public function down()
    {
        $this->forge->dropTable('berkas');
    }
}
