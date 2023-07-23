<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatJabatan extends Model
{
    protected $table            = 'riwayat_jabatan';
    protected $allowedFields    = ['id', 'nama', 'pengguna_id', 'awal', 'akhir'];
}
