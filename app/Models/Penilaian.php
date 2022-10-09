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
  
    public function unSelected($id){
        $result = $this->db->query("SELECT kriteria.* FROM `kriteria` WHERE kriteria.id NOT IN 
        (SELECT kriteria.id FROM kriteria JOIN penilaian ON kriteria.id = penilaian.id_kriteria 
        WHERE penilaian.id_pendaftar = '$id')")->getResultArray();
        return $result;
    }

}