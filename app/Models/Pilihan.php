<?php

namespace App\Models;

use CodeIgniter\Model;

class Pilihan extends Model
{
    protected $table            = 'pilihan';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama', 'bobot', 'id_kriteria'];
    protected $useTimestamps    = true;
    
}