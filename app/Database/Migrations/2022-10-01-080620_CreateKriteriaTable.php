<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKriteriaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'     => [
                'type'          => 'CHAR',
                'constraint'    => 4,
            ],
            'nama'   => [
                'type'          => 'VARCHAR',
                'constraint'    => 100
            ],
            'bobot' => [
                'type'          => 'INT',
                'constraint'    => 3
            ],
            'status'        => [
                'type'          => 'ENUM',
                'constraint'    => "'Benefit', 'Cost'",
                'default'       => 'Benefit'
            ],
            'created_at'    => [
                'type'          => 'DATETIME',
                'null'          => TRUE
            ],
            'updated_at'    => [
                'type'          => 'DATETIME',
                'null'          => TRUE
            ],
            'deleted_at'    => [
                'type'          => 'DATETIME',
                'null'          => TRUE
            ],

        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('kriteria');
    }

    public function down()
    {
        $this->forge->dropTable('kriteria');
    }
}