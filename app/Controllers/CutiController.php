<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cuti;
use Config\Services;

class CutiController extends BaseController
{
    public $cuti;
    public $services;

    public function __construct()
    {
        $this->cuti = new Cuti();
        $this->services = new Services();
    }
    public function index()
    {
        $data['listCuti'] = $this->cuti->findAll();
        $data['title'] = 'Cuti';
        return view('cuti/index', $data);
    }
    public function store() {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $cuti = [
            'mulai' => $this->request->getVar('mulai'),
            'akhir' => $this->request->getVar('akhir'),
            'alasan' => $this->request->getVar('alasan'),
            'pengguna_id' => $this->request->getVar('pengguna_id'),
            'status' => 'proses'
        ];
        // Lakukan validasi
        if($validation->run($cuti, 'cuti')) {
            //jika validasi sukses
            // Simpan Data
            $this->cuti->save($cuti);
            // Redirect + pesan sukses
            return redirect()->to(route_to('cuti.detail', $cuti['pengguna_id']))->with('success', 'Data peengajuan cuti berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('cuti.detail', $cuti['pengguna_id']))->with('error', 'Data pengajuan cuti gagal disimpan');             
        }
    }
        
    public function detail($id)
    {
        $data['listCuti'] = $this->cuti->where('pengguna_id', $id)->findAll();
        $data['title'] = 'Pengajuan Cuti';
        return view('cuti/detail', $data);
    }

    public function update($id) {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $cuti = [
            'id' => $id,
            'mulai' => $this->request->getVar('mulai'),
            'akhir' => $this->request->getVar('akhir'),
            'alasan' => $this->request->getVar('alasan'),
            'pengguna_id' => $this->request->getVar('pengguna_id'),
            'status' => $this->request->getVar('status')
        ];
        // Lakukan validasi
        if($validation->run($cuti, 'cuti')) {
            //jika validasi sukses
            // Simpan Data
            $this->cuti->save($cuti, ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('cuti.detail', $cuti['pengguna_id']))->with('success', 'Data pengguna berhasil diupdate');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('cuti.detail', $cuti['pengguna_id']))->with('error', 'Data pengguna gagal diupdate');             
        }
    }
    
    public function delete($id) {
        // Menghapus data
        $deleted = $this->cuti->delete(['id' => $id]);
        // Jika berhasil terhapus
        if($deleted) {
            // Redirect + pesan sukses
            return redirect()->to(route_to('pengguna.index'))->with('success', 'Data pengguna berhasil dihapus');
        // Jika gagal
        } else {
            // Redirect + pesan gagal
            return redirect()->to(route_to('pengguna.index'))->with('error', 'Data pengguna gagal dihapus');             
        }
    }
}