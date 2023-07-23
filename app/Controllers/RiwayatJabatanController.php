<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RiwayatJabatan;
use Config\Services;

class RiwayatJabatanController extends BaseController
{
    public $jabatan;
    public $services;

    public function __construct()
    {
        $this->jabatan = new RiwayatJabatan();
        $this->services = new Services();  
    }

    public function index($pengguna_id)
    {
        $data['listJabatan'] = $this->jabatan->where('pengguna_id', $pengguna_id)->orderBy('id')->findAll();
        $data['title'] = 'Riwayat Jabatan';
        return view('jabatan/index', $data);
    }

    public function store() {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $jabatan = [
            'awal' => $this->request->getVar('awal'),
            'akhir' => $this->request->getVar('akhir'),
            'nama' => $this->request->getVar('nama'),
            'pengguna_id' => session('id'),
        ];
        // Lakukan validasi
        if($validation->run($jabatan, 'jabatan')) {
            //jika validasi sukses
            // Simpan Data
            $this->jabatan->save($jabatan);
            // Redirect + pesan sukses
            return redirect()->to(route_to('jabatan.index', session('id')))->with('success', 'Data jabatan berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('jabatan.index', session('id')))->with('error', 'Data jabatan gagal disimpan');             
        }
    }

    public function update($id) {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $jabatan = [
            'id' => $id,
            'awal' => $this->request->getVar('awal'),
            'akhir' => $this->request->getVar('akhir'),
            'nama' => $this->request->getVar('nama'),
            'pengguna_id' => session('id'),
        ];
        // Lakukan validasi
        if($validation->run($jabatan, 'jabatan')) {
            //jika validasi sukses
            // Simpan Data
            $this->jabatan->save($jabatan, ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('jabatan.index', session('id')))->with('success', 'Data jabatan berhasil diupdate');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('cuti.detail', session('id')))->with('error', 'Data jabatan gagal diupdate');             
        }
    }
    
    public function delete($id) {
        // Menghapus data
        $deleted = $this->jabatan->delete(['id' => $id]);
        // Jika berhasil terhapus
        if($deleted) {
            // Redirect + pesan sukses
            return redirect()->to(route_to('jabatan.index', session('id')))->with('success', 'Data jabatan berhasil dihapus');
        // Jika gagal
        } else {
            // Redirect + pesan gagal
            return redirect()->to(route_to('jabatan.index', session('id')))->with('error', 'Data jabatan gagal dihapus');             
        }
    }
}
