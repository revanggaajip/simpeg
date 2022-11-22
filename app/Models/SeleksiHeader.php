<?php

namespace App\Models;

use CodeIgniter\Model;

class SeleksiHeader extends Model
{
    protected $table            = 'seleksi_header';
    protected $primaryKey       = 'id';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama', 'kuota'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}