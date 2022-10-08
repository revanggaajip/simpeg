<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna;
use Config\Services;

class PenggunaController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Pengguna';
        $this->services = new Services();
        $this->pengguna = new Pengguna();
    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['listPengguna'] = $this->pengguna->orderBy('created_at', 'DESC')->findAll();
        return view('pengguna/index', $data);
    }
    public function store() {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Cek Konfirmasi Password
        if ($this->request->getVar('password') != $this->request->getVar('konfirmasi_password')) {
            return redirect()->to(route_to('pengguna.index'))->with('error', 'Konfirmasi Password Tidak Sesuai');             
        }
        // Enkripsi password
        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        // Ambil data dari inputan
        $pengguna = [
            'nama' => $this->request->getVar('nama'),
            'email'=> $this->request->getVar('email'),
            'password' => $password
        ];
        // Lakukan validasi
        if($validation->run($pengguna, 'pengguna')) {
            //jika validasi sukses
            // Simpan Data
            $this->pengguna->save($pengguna);
            // Redirect + pesan sukses
            return redirect()->to(route_to('pengguna.index'))->with('success', 'Data pengguna berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('pengguna.index'))->with('error', 'Data pengguna gagal disimpan');             
        }
    }

    public function update($id) {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $pengguna = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'email'=> $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            // 'role' => $this->request->getVar('role'),
        ];
        // Lakukan validasi
        if($validation->run($pengguna, 'pengguna')) {
            //jika validasi sukses
            // Simpan Data
            $this->pengguna->save($pengguna, ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('pengguna.index'))->with('success', 'Data pengguna berhasil diupdate');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('pengguna.index'))->with('error', 'Data pengguna gagal diupdate');             
        }
    }
    
    public function delete($id) {
        // Menghapus data
        $deleted = $this->pengguna->delete(['id' => $id]);
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