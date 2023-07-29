<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCutiTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
        'id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true, 'auto_increment'=> true],  
        'pengguna_id' => ['type'=> 'BIGINT','constraint'=> 20, 'unsigned'=> true],  
        'mulai' => ['type'=> 'date'],
        'akhir' => ['type' => 'date'],
        'alasan'=> ['type' => 'varchar', 'constraint' => 255],
        'status'=> ['type' => 'varchar', 'constraint' => 50],
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
        $this->forge->createTable('cuti');
    }
    
    public function down()
    {
        $this->forge->dropTable('cuti');
    }
}