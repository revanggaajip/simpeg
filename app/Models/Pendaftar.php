<?php

namespace App\Models;

use CodeIgniter\Model;

class Pendaftar extends Model
{
    protected $table            = 'pendaftar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nik', 'nama', 'alamat', 'status'];
    protected $useTimestamps = true;

    public function penilaianPendaftar()
    {
        $result = $this->join("penilaian", "penilaian.id_pendaftar = pendaftar.id", "left")
        ->select('pendaftar.id,pendaftar.nik,pendaftar.nama,count(penilaian.id) as penilaian')
        ->groupBy('pendaftar.id')
        ->where('pendaftar.status','aktif')
        ->orderBy('pendaftar.created_at', 'DESC')
        ->findAll();
        return $result;
    }
}