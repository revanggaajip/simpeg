<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Instansi;

class InstansiController extends BaseController
{
    public function index()
    {
        $instansi = new Instansi();

        $data['instansi'] = $instansi->find('1');
        dd($data);
    }

    public function update()
    {

    }
}