<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RiwayatPendidikan;
use Config\Services;

class PendidikanController extends BaseController
{
    public $pendidikan;
    public $services;

    public function __construct()
    {
        $this->pendidikan = new RiwayatPendidikan();
        $this->services = new Services();
    }

    public function index($pengguna_id)
    {
        $data['listPendidikan'] = $this->pendidikan->where('pengguna_id', $pengguna_id)->orderBy('id')->findAll();
        $data['title'] = 'Riwayat Pendidikan';
        return view('pendidikan/index', $data);
    }

    public function store() {
        // panggil helper validasi input data
        $validation = $this->services::validation();
        // Ambil data dari inputan
        $pendidikan = [
            'masuk' => $this->request->getVar('masuk'),
            'lulus' => $this->request->getVar('lulus'),
            'nama' => $this->request->getVar('nama'),
            'pengguna_id' => $this->request->getVar('pengguna_id'),
            'tingkatan' => $this->request->getVar('tingkatan')
        ];
        // Lakukan validasi
        if($validation->run($pendidikan, 'pendidikan')) {
            //jika validasi sukses
            // Simpan Data
            $this->pendidikan->save($pendidikan);
            // Redirect + pesan sukses
            return redirect()->to(route_to('pendidikan.index', session('id')))->with('success', 'Data pendidikan berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('pendidikan.index', session('id')))->with('error', 'Data pendidikan gagal disimpan');             
        }
    }

    public function update($id) {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $pendidikan = [
            'id' => $id,
            'masuk' => $this->request->getVar('masuk'),
            'lulus' => $this->request->getVar('lulus'),
            'nama' => $this->request->getVar('nama'),
            'pengguna_id' => $this->request->getVar('pengguna_id'),
            'tingkatan' => $this->request->getVar('tingkatan')
        ];
        // Lakukan validasi
        if($validation->run($pendidikan, 'pendidikan')) {
            //jika validasi sukses
            // Simpan Data
            $this->pendidikan->save($pendidikan, ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('pendidikan.index', session('id')))->with('success', 'Data pendidikan berhasil diupdate');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('pendidikan.index', session('id')))->with('error', 'Data pendidikan gagal diupdate');             
        }
    }
    
    public function delete($id) {
        // Menghapus data
        $deleted = $this->pendidikan->delete(['id' => $id]);
        // Jika berhasil terhapus
        if($deleted) {
            // Redirect + pesan sukses
            return redirect()->to(route_to('pendidikan.index', session('id')))->with('success', 'Data pendidikan berhasil dihapus');
        // Jika gagal
        } else {
            // Redirect + pesan gagal
            return redirect()->to(route_to('pendidikan.index', session('id')))->with('error', 'Data pendidikan gagal dihapus');             
        }
    }
}
