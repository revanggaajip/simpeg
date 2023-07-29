<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Gaji;
use App\Models\Pengguna;
use Config\Services;

class GajiController extends BaseController
{    
    public $title;
    public $services;
    public $pengguna;
    public $gaji;
    
    public function __construct()
    {
        $this->title = 'Penggajian Pegawai';
        $this->services = new Services();
        $this->pengguna = new Pengguna();
        $this->gaji = new Gaji();
    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['listPengguna'] = $this->pengguna->orderBy('created_at', 'DESC')->findAll();
        return view('gaji/index', $data);
    }

    public function detail($id)
    {
        $data['listGaji'] = $this->gaji->where('pengguna_id', $id)->findAll();
        $data['pengguna'] = $this->pengguna->find($id);
        $data['title'] = $id == session('id') ? 'Riwayat Gaji' : $this->title;
        return view('gaji/detail', $data);
    }

    public function store($id)
    {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $gaji = [
            'periode' => $this->request->getVar('periode'),
            'gapok' => $this->request->getVar('gapok'),
            'potongan' => $this->request->getVar('potongan'),
            'tunjangan' => $this->request->getVar('tunjangan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'total' => $this->request->getVar('total'),
            'pengguna_id' => $id,
        ];
        // Lakukan validasi
        if($validation->run($gaji, 'gaji')) {
            //jika validasi sukses
            // Simpan Data
            $this->gaji->save($gaji);
            // Redirect + pesan sukses
            return redirect()->to(route_to('gaji.detail', $id))->with('success', 'Data riwayat gaji berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('gaji.detail', $id))->with('error', 'Data riwayat gaji gagal disimpan');             
        }
    }

    public function update($id)
    {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari inputan
        $gaji = [
            'id' => $id,
            'periode' => $this->request->getVar('periode'),
            'gapok' => $this->request->getVar('gapok'),
            'potongan' => $this->request->getVar('potongan'),
            'tunjangan' => $this->request->getVar('tunjangan'),
            'keterangan' => $this->request->getVar('keterangan'),
            'total' => $this->request->getVar('total'),
            'pengguna_id' => $id,
        ];
        // Lakukan validasi
        if($validation->run($gaji, 'gaji')) {
        //jika validasi sukses
        // Simpan Data
        $this->gaji->save($gaji, ['id' => $id]);
        // Redirect + pesan sukses
        return redirect()->to(route_to('gaji.detail', $id))->with('success', 'Data riwayat gaji berhasil diupdate');
    } 
    // jika validasi gagal
    else {
        // Meneruskan data error dari validasi ke view
        session()->setFlashdata('errors', $validation->getErrors());
        // Redirect + pesan gagal
        return redirect()->to(route_to('gaji.detail', $id))->with('error', 'Data riwayat gaji gagal diupdate');             
    }
    }

    public function delete($id) {
    // Menghapus data
    $deleted = $this->gaji->delete(['id' => $id]);
    // Jika berhasil terhapus
    if($deleted) {
        // Redirect + pesan sukses
        return redirect()->to(route_to('gaji.detail', $id))->with('success', 'Data riwayat gaji berhasil dihapus');
    // Jika gagal
    } else {
        // Redirect + pesan gagal
        return redirect()->to(route_to('gaji.detail', $id))->with('error', 'Data riwayat gaji gagal dihapus');             
    }
    }
    }
