<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSeleksiDetailTable extends Migration
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
            'id_pendaftar'      => [
                'type'              => 'VARCHAR',
                'constraint'        => 10,
            ],
            'nama'   => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'nilai' => [
                'type'          => 'FLOAT',
            ],
            'penerima'          => [
                'type'          => 'VARCHAR',
                'constraint'    => 20
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
        $this->forge->createTable('seleksi_detail');
    }
    
    public function down()
    {
        $this->forge->dropTable('seleksi_detail');
    }
}