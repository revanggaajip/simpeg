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
        //
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
            'nama' => $this->request->getVar('nama'),
            'nip'=> $this->request->getVar('nip'),
            'nik'=> $this->request->getVar('nik'),
            'jenis_kelamin'=> $this->request->getVar('jenis_kelamin'),
            'tempat_lahir'=> $this->request->getVar('tempat_lahir'),
            'tanggal_lahir'=> $this->request->getVar('tanggal_lahir'),
            'agama'=> $this->request->getVar('agama'),
            'alamat'=> $this->request->getVar('alamat'),
            'jabatan'=> $this->request->getVar('jabatan'),
            'mulai_kerja'=> $this->request->getVar('mulai_kerja'),
            'gaji'=> $this->request->getVar('gaji'),
            'npwp'=> $this->request->getVar('npwp'),
            'role'=> $this->request->getVar('role'),
            'password' => $this->request->getVar('password')
        ];
        // Lakukan validasi
        if($validation->run($cuti, 'cuti')) {
            //jika validasi sukses
            // Simpan Data
            $this->cuti->save($cuti, ['id' => $id]);
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