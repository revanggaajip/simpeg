<?php

namespace App\Models;

use CodeIgniter\Model;

class Cuti extends Model
{
    protected $table            = 'cuti';
    protected $allowedFields    = ['mulai', 'akhir', 'alasan', 'status', 'pengguna_id'];
}