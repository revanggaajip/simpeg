<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Keluarga;
use Config\Services;

class KeluargaController extends BaseController
{
    public $keluarga;
    public $services;

    public function __construct()
    {
        $this->keluarga = new Keluarga();
        $this->services = new Services();
    }

    public function index($pengguna_id)
    {
        $data['listKeluarga'] = $this->keluarga->where('pengguna_id', $pengguna_id)->orderBy('id')->findAll();
        $data['title'] = 'Anggota Keluarga';
        return view('keluarga/index', $data);
    }

    public function store() {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $keluarga = [
            'nama' => $this->request->getVar('nama'),
            'hubungan' => $this->request->getVar('hubungan'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'pengguna_id' => session('id'),
        ];
        // Lakukan validasi
        if($validation->run($keluarga, 'keluarga')) {
            //jika validasi sukses
            // Simpan Data
            $this->keluarga->save($keluarga);
            // Redirect + pesan sukses
            return redirect()->to(route_to('keluarga.index', session('id')))->with('success', 'Data anggota keluarga berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('keluarga.index', session('id')))->with('error', 'Data anggota keluarga gagal disimpan');             
        }
    }

    public function update($id) {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $keluarga = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'hubungan' => $this->request->getVar('hubungan'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'pengguna_id' => session('id'),
        ];
        // Lakukan validasi
        if($validation->run($keluarga, 'keluarga')) {
            //jika validasi sukses
            // Simpan Data
            $this->keluarga->save($keluarga, ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('keluarga.index', session('id')))->with('success', 'Data anggota keluarga berhasil diupdate');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('cuti.detail', session('id')))->with('error', 'Data anggota keluarga gagal diupdate');             
        }
    }
    
    public function delete($id) {
        // Menghapus data
        $deleted = $this->keluarga->delete(['id' => $id]);
        // Jika berhasil terhapus
        if($deleted) {
            // Redirect + pesan sukses
            return redirect()->to(route_to('keluarga.index', session('id')))->with('success', 'Data anggota keluarga berhasil dihapus');
        // Jika gagal
        } else {
            // Redirect + pesan gagal
            return redirect()->to(route_to('keluarga.index', session('id')))->with('error', 'Data anggota keluarga gagal dihapus');             
        }
    }
}
