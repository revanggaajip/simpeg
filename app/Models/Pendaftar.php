<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftar extends Model
{
    protected $table            = 'pendaftar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nik', 'nama', 'alamat'];

    // Dates
    protected $useTimestamps = true;
}