<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kriteria;
use Config\Services;
use Exception;

class KriteriaController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Kriteria';
        $this->services = new Services();
        $this->kriteria = new Kriteria();
    }

    public function index()
    {
        // judul
        $data['title'] = $this->title;
        // ambil data database
        $data['listKriteria'] = $this->kriteria->findAll();
        // generate id
        $jumlahKriteria = $this->kriteria->countAll();
        if ($jumlahKriteria > 0) {
            $data['id'] = 'K-'.sprintf("%02s", ++$jumlahKriteria);
        } else {
            $data['id'] = 'K-01';
        }
        return view('kriteria/index', $data);
    }

    public function store() {
        // panggil helper validasi input data
        $validation = $this->services::validation();
        // Ambil data dari inputan
        $kriteria = [
            'id' => $this->request->getVar('id'),
            'nama' => ucfirst($this->request->getVar('nama')),
            'bobot'=> $this->request->getVar('bobot'),
            'status' => $this->request->getVar('status'),
        ];
        // Lakukan validasi
        if($validation->run($kriteria, 'kriteria')) {
            //jika validasi sukses
            // Simpan Data
            $this->kriteria->save($kriteria);
            // Redirect + pesan sukses
            return redirect()->to(route_to('kriteria.index'))->with('success', 'Data kriteria berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('kriteria.index'))->with('error', 'Data kriteria gagal disimpan');             
        }
    }

    public function update($id) {
        // panggil helper validasi input data
        $validation = $this->services::validation();
        // Ambil data dari inputan
        $kriteria = [
            'id' => $this->request->getVar('id'),
            'nama' => ucfirst($this->request->getVar('nama')),
            'bobot'=> $this->request->getVar('bobot'),
            'status' => $this->request->getVar('status'),
        ];
        // Lakukan validasi
        if($validation->run($kriteria, 'kriteria')) {
            //jika validasi sukses
            // Simpan Data
            $this->kriteria->save($kriteria, ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('kriteria.index'))->with('success', 'Data kriteria berhasil diupdate');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('kriteria.index'))->with('error', 'Data kriteria gagal diupdate');             
        }
    }
    
    public function delete($id) {
        $deleted = $this->kriteria->delete(['id' => $id]);
        if($deleted) {
            return redirect()->to(route_to('kriteria.index'))->with('success', 'Data kriteria berhasil dihapus');
        } else {
            return redirect()->to(route_to('kriteria.index'))->with('error', 'Data kriteria gagal dihapus');             
        }
    }
}