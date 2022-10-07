<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pendaftar;
use Config\Services;

class PendaftarController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Pendaftar';
        $this->services = new Services();
        $this->pendaftar = new Pendaftar();
    }

    public function index()
    {
        $data['title']  = $this->title;
        $data['listPendaftar'] = $this->pendaftar->orderBy('created_at', 'DESC')->findAll();
        return view('pendaftar/index', $data);
    }
    
    public function create()
    {
        // panggil helper validasi input data
        $data['validation'] = $this->services::validation();
        $data['title']  = $this->title;
        return view('pendaftar/create', $data);
    }

    public function store()
    {
         // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $pendaftar = [
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'alamat' => $this->request->getVar('alamat'),
        ];
         // Lakukan validasi
        if($validation->run($pendaftar, 'pendaftar')) {
            //jika validasi sukses
            // Simpan Data
            $this->pendaftar->save($pendaftar);
            // Redirect + pesan sukses
            return redirect()->to(route_to('pendaftar.index'))->with('success', 'Data pendaftar berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->back()->withInput()->with('error', 'Data pendaftar gagal disimpan');             
        }
    }

    public function detail($id)
    {
        $data['title'] = $this->title;
        $data['pendaftar'] = $this->pendaftar->where('id', $id)->first();
        return view('pendaftar/detail', $data);

    }
}