<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna extends Model
{
    protected $table            = 'pengguna';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama', 'nip', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'mulai_kerja', 'alamat', 'agama', 'jabatan', 'status', 'npwp', 'gaji','password', 'role'];

    // Dates
    protected $useTimestamps = true;
}