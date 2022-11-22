<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SeleksiDetail;
use App\Models\SeleksiHeader;

class LaporanController extends BaseController
{
    public function __construct()
    {
        $this->seleksiHeader = new SeleksiHeader();
        $this->seleksiDetail = new SeleksiDetail();
        $this->title         = 'Laporan';
    }

    public function index()
    {
        $data['title']  = $this->title;
        $data['listSeleksi'] = $this->seleksiHeader->orderBy('created_at', 'DESC')->findAll();
        return view('laporan/index', $data);
    }
    
    public function detail($id)
    {
        $data['title'] = $this->title;
        $data['seleksiHeader'] = $this->seleksiHeader->where('id', $id)->first();
        $data['seleksiDetail'] = $this->seleksiDetail->where('id_seleksi_header', $id)->findAll();
        return view('laporan/detail', $data);
    }

    public function delete($id)
    {
        $deletedSeleksiHeader = $this->seleksiHeader->delete(['id' => $id]);
        $deletedSeleksiDetail = $this->seleksiDetail->delete(['id_seleksi_header' => $id]);
        if ($deletedSeleksiHeader && $deletedSeleksiDetail) {
            return redirect()->to(route_to('laporan.index'))->with('success', 'Data laporan berhasil dihapus');
        } else {
            return redirect()->to(route_to('laporan.index'))->with('error', 'Data laporan gagal dihapus');             
        }
    }
}