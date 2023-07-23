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
        $data['listCuti'] = $this->cuti->join('pengguna', 'pengguna.id = cuti.pengguna_id')
        ->select('cuti.id, cuti.mulai, cuti.akhir, cuti.alasan, cuti.status, pengguna.nama')
        ->orderBy('id', 'DESC')
        ->findAll();
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
        $data['listCuti'] = $this->cuti->where('pengguna_id', $id)->orderBy('id', 'DESC')->findAll();
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
            'status' => 'proses'
        ];
        // Lakukan validasi
        if($validation->run($cuti, 'cuti')) {
            //jika validasi sukses
            // Simpan Data
            $this->cuti->save($cuti, ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('cuti.detail', $cuti['pengguna_id']))->with('success', 'Data cuti berhasil diupdate');
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
            return redirect()->to(route_to('cuti.detail', session('id')))->with('success', 'Data cuti berhasil dihapus');
        // Jika gagal
        } else {
            // Redirect + pesan gagal
            return redirect()->to(route_to('cuti.detail', session('id')))->with('error', 'Data cuti gagal dihapus');             
        }
    }

    public function setujui($id)
    {
        // update menjadi disetujui
        $this->cuti->save([
            'id' => $id,
            'status' => 'disetujui'
        ], ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('cuti.index'))->with('success', 'Data pengajuan cuti berhasil disetujui');
    }

    public function tolak($id)
    {
        // update menjadi ditolak
        $this->cuti->save([
            'id' => $id,
            'status' => 'ditolak'
        ], ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('cuti.index'))->with('success', 'Data pengajuan cuti berhasil ditolak');
    }
}