<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Gaji;
use App\Models\Pengguna;
use Config\Services;

class GajiController extends BaseController
{    
    public $title;
    public $services;
    public $pengguna;
    public $gaji;
    
    public function __construct()
    {
        $this->title = 'Penggajian Pegawai';
        $this->services = new Services();
        $this->pengguna = new Pengguna();
        $this->gaji = new Gaji();
    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['listPengguna'] = $this->pengguna->orderBy('created_at', 'DESC')->findAll();
        return view('gaji/index', $data);
    }
}
