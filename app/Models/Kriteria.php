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

    public function unSelected($id)
    {
        return $this->select('kriteria.*')->where("kriteria.id NOT IN 
        (SELECT kriteria.id FROM kriteria JOIN penilaian ON kriteria.id = penilaian.id_kriteria 
        WHERE penilaian.id_pendaftar = '$id')")->findAll();
    }
}