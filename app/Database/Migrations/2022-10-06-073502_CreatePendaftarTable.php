<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendaftarTable extends Migration
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
            'nik'          => [
                'type'          => 'CHAR',
                'constraint'    => 16,
                'unique'        => true
            ],
            'nama'          => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'alamat'          => [
                'type'          => 'LONGTEXT',
            ],
            'created_at'    => [
                'type'          => 'DATETIME',
                'null'          => TRUE
            ],
            'updated_at'    => [
                'type'          => 'DATETIME',
                'null'          => TRUE
            ],
        ]);
        $this->forge->addKey('id');
        $this->forge->createTable('pendaftar');
    }

    public function down()
    {
        //
    }
}