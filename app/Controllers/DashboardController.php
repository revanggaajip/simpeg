<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cuti;
use App\Models\Gaji;
use App\Models\Pengguna;

class DashboardController extends BaseController
{
    public function index()
    {
        if (session('role') != 'admin') {
            return redirect()->to('/pengguna/detail/' . session('id'));
        }

        $pengguna = new Pengguna();
        $cuti = new Cuti();
        $gaji = new Gaji();

        $data['title'] = 'Dashboard';
        $data['cuti'] = $cuti->where('YEAR(created_at)', date('Y'))->where('MONTH(created_at)', date('m'))->countAllResults();
        $data['gaji'] = $gaji->selectSum('total')->first();
        $data['pengguna'] = $pengguna->countAllResults();

        return view('dashboard/index', $data);
    }
}