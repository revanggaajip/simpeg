<?php

namespace App\Models;

use CodeIgniter\Model;

class RiwayatPendidikan extends Model
{
    protected $table            = 'riwayat_pendidikan';
    protected $protectFields    = true;
    protected $useTimestamps = true;
    protected $allowedFields    = ['id', 'pengguna_id', 'nama', 'masuk', 'lulus', 'tingkatan'];
}
