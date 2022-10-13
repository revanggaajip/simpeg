<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePilihanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'nama'          => [
                'type'          => 'VARCHAR',
                'constraint'        => 255,
            ],
            'bobot'          => [
                'type'          => 'INT',
                'constraint'    => 11
            ],
            'id_kriteria'     => [
                'type'          => 'CHAR',
                'constraint'    => 4,
            ],
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
        $this->forge->createTable('pilihan');
    }

    public function down()
    {
        $this->forge->dropTable('pilihan');
    }
}