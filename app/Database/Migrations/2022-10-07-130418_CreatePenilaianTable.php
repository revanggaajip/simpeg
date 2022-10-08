<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenilaianTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'  => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true,
                'auto_increment'=> true
            ],
            'id_pendaftar' => [
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => true
            ],
            'id_kriteria' => [
                'type'          => 'CHAR',
                'constraint'    => 4
            ],
            'nilai_kriteria' => [
                'type'          => 'INT',
                'constraint'    => 3,
                'null'          => true
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
        $this->forge->createTable('penilaian');
    }

    public function down()
    {
        $this->forge->dropTable('penilaian');
    }
}