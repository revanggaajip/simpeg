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
            'nip'          => [
                'type'          => 'VARCHAR',
                'constraint'    => 20,
                'unique'        => true
            ],
            'nama'          => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'jenis_kelamin'          => [
                'type'          => 'enum',
                'constraint'    => ['Laki-laki', 'Perempuan']
            ],
            'tempat_lahir'         => [
                'type'              => 'varchar',
                'constraint'        => '100'
            ],
            'tanggal_lahir'         => [
                'type'              => 'date',
            ],
            'mulai_kerja'         => [
                'type'              => 'date',
            ],
            'alamat'         => [
                'type'              => 'text',
            ],
            'agama'         => [
                'type'          => 'varchar',
                'constraint'    => '20'
            ],
            'jabatan'         => [
                'type'          => 'varchar',
                'constraint'    => '100'
            ],
            'gaji' => [
                'type'          => 'double'
            ],
            'npwp'         => [
                'type'          => 'varchar',
                'constraint'    => '100',
                'nullable'      => true
            ],
            'status' => [
                'type'          => 'enum',
                'constraint'    => ['Aktif', 'Tidak Aktif'],
                'default'       => 'Aktif'
            ],
            'password'      => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'role'          => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
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