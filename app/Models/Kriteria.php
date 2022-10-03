<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteria extends Model
{
    protected $table            = 'kriteria';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id','nama', 'bobot', 'status'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
}