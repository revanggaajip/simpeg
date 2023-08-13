<?php

namespace App\Models;

use CodeIgniter\Model;

class Berkas extends Model
{
    protected $table            = 'berkas';
    protected $primaryKey       = 'id';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'pengguna_id', 'nama', 'keterangan'];

    // Dates
    protected $useTimestamps = true;
    }
