<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatPendidikan extends Model
{
    protected $table            = 'riwayat_pendidikan';
    protected $allowedFields    = ['id', 'pengguna_id', 'nama', 'masuk', 'lulus', 'tingkatan'];
}
