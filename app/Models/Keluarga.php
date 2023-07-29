<?php

namespace App\Models;

use CodeIgniter\Model;

class Keluarga extends Model
{
    protected $table            = 'keluarga';
    protected $protectFields    = true;
    protected $useTimestamps = true;
    protected $allowedFields    = ['id', 'nama', 'pengguna_id', 'tanggal_lahir', 'hubungan'];
}
