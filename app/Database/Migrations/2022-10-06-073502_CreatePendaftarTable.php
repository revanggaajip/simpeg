<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendaftarTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'              => 'BigInt',
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
                'type'          => 'TEXT',
            ],
            'status'          => [
                'type'          => 'ENUM',
                'constraint'    =>'"aktif", "tidak aktif"',
                'default'       =>'aktif'
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('pendaftar');
    }

    public function down()
    {
        $this->forge->dropTable('pendaftar');
    }
}