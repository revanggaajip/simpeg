<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SeleksiDetail;
use App\Models\SeleksiHeader;
use Dompdf\Dompdf;

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
        $header = $this->seleksiHeader->where('id', $id)->first();
        $data['title'] = $this->title . " " .$header['nama'];
        $data['seleksiHeader'] = $header;
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

    public function print($id)
    {
        $seleksiHeader = $this->seleksiHeader->where('id', $id)->first();
        $seleksiDetail = $this->seleksiDetail->where('id_seleksi_header', $id)->findAll();
        $title = 'Laporan SPK Bantuan ' . $seleksiHeader['nama'];
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('laporan/print', compact('seleksiHeader', 'seleksiDetail', 'title')));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($title, ['Attachment' => 0]);
    }
}