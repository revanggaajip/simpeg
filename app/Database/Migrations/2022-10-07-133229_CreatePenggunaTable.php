<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'nama'          => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'email'         => [
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ],
            'password'      => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'role'          => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
                'default'           => 'admin'
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
        $this->forge->createTable('pengguna');
    }
    
    public function down()
    {
        $this->forge->dropTable('pengguna');
    }
}