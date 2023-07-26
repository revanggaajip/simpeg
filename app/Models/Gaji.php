<?php

namespace App\Models;

use CodeIgniter\Model;

class Gaji extends Model
{
    protected $table            = 'gaji';
    protected $allowedFields    = ['id', 'pengguna_id', 'gapok', 'potongan', 'tunjangan', 'total', 'periode', 'keterangan'];

}
