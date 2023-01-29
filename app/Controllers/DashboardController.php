<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kriteria;
use App\Models\Pendaftar;
use App\Models\Pengguna;
use App\Models\SeleksiHeader;

class DashboardController extends BaseController
{
    public function index()
    {
        $kriteria = new Kriteria();
        $pendaftar = new Pendaftar();
        $seleksiHeader = new SeleksiHeader();
        $pengguna = new Pengguna();
        $data['title'] = 'Dashboard';
        $data['kriteria'] = $kriteria->countAllResults();
        $data['pendaftar'] = $pendaftar->countAllResults();
        $data['laporan'] = $seleksiHeader->countAllResults();
        $data['pengguna'] = $pengguna->countAllResults();

        return view('dashboard/index', $data);
    }
}