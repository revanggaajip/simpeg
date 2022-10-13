<?php

namespace App\Models;

use CodeIgniter\Model;

class Penilaian extends Model
{
    protected $table            = 'penilaian';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'id_pendaftar', 'id_kriteria', 'nilai_kriteria'];
    protected $useTimestamps    = true;
  
 }