<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGajiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true, 'auto_increment'=> true],  
            'pengguna_id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true],
            'gapok' => ['type' => 'double'],
            'potongan' => ['type'=> 'double'],
            'tunjangan' => ['type' => 'double'],
            'total' => ['type' => 'double'],
            'periode' => ['type' => 'text'],
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
        $this->forge->createTable('gaji');
    }

    public function down()
    {
        $this->forge->dropTable('gaji');
    }
}
