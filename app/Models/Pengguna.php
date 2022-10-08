<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengguna extends Model
{
    protected $table            = 'pengguna';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama', 'email', 'password', 'role'];

    // Dates
    protected $useTimestamps = true;
}