<?php

namespace App\Models;

use CodeIgniter\Model;

class SeleksiDetail extends Model
{
    protected $table            = 'seleksi_detail';
    protected $primaryKey       = 'id';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'id_pendaftar', 'id_seleksi_header', 'nama', 'nilai', 'penerima'];
    protected $useTimestamps    = true;
}
  