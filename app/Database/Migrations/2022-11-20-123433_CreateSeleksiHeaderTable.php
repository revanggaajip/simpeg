<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSeleksiHeaderTable extends Migration
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
            'nama'   => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'kuota' => [
                'type'          => 'INT',
                'constraint'    => 5
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
        $this->forge->createTable('seleksi_header');
    }
    
    public function down()
    {
        $this->forge->dropTable('seleksi_header');
    }
}