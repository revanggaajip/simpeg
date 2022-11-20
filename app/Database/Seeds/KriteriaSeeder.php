<?php

namespace App\Database\Seeds;

use App\Models\Kriteria;
use CodeIgniter\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    public function run()
    {
        $kriteria = new Kriteria();
        $kriteria->insertBatch([
            [
                'id' => 'K-01',
                'nama' => 'Kelengkapan Data',
                'bobot' => ''
            ],
        ]);
    }
}