<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kriteria;
use App\Models\Pilihan;
use Config\Services;

class KriteriaController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Kriteria';
        $this->services = new Services();
        $this->kriteria = new Kriteria();
        $this->pilihan = new Pilihan();
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
    
    public function delete($id) 
    {
        $deleted = $this->kriteria->delete(['id' => $id]);
        if($deleted) {
            return redirect()->to(route_to('kriteria.index'))->with('success', 'Data kriteria berhasil dihapus');
        } else {
            return redirect()->to(route_to('kriteria.index'))->with('error', 'Data kriteria gagal dihapus');             
        }
    }

    public function pilihan($id)
    {
        $data['title']  = $this->title;
        $data['kriteria'] = $this->kriteria->where('id', $id)->first();
        $data['listPilihan'] = $this->pilihan->where('id_kriteria', $id)->findAll();
        return view('kriteria/pilihan', $data);
    }

    public function pilihanStore($id)
    {
        // panggil helper validasi input data
        $validation = $this->services::validation();
        // Ambil data dari inputan
        $pilihan = [
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('nama'),
            'bobot'=> $this->request->getVar('bobot'),
            'id_kriteria' => $id
        ];
        // Lakukan validasi
        if($validation->run($pilihan, 'pilihan')) {
            //jika validasi sukses
            // Simpan Data
            $this->pilihan->save($pilihan);
            // Redirect + pesan sukses
            return redirect()->to(route_to('kriteria.pilihan', $id))->with('success', 'Data pilihan kriteria berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('kriteria.pilihan', $id))->with('error', 'Data pilihan kriteria gagal disimpan');             
        }
    }

    public function pilihanUpdate($id) {
        // panggil helper validasi input data
        $validation = $this->services::validation();
        // Ambil data dari inputan
        $pilihan = [
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'bobot'=> $this->request->getVar('bobot'),
            'id_kriteria' => $this->request->getVar('id_kriteria'),
        ];
        // Lakukan validasi
        if($validation->run($pilihan, 'pilihan')) {
            //jika validasi sukses
            // Simpan Data
            $this->pilihan->save($pilihan, ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('kriteria.pilihan', $pilihan['id_kriteria']))->with('success', 'Data pilihan kriteria berhasil diupdate');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('kriteria.pilihan', $pilihan['id_kriteria']))->with('error', 'Data pilihan kriteria gagal diupdate');             
        }
    }
    
    public function pilihanDelete($id) 
    {
        $id_kriteria = $this->request->getVar('id_kriteria');
        $deleted = $this->pilihan->delete(['id' => $id]);
        if($deleted) {
            return redirect()->to(route_to('kriteria.pilihan', $id_kriteria))->with('success', 'Data pilihan kriteria berhasil dihapus');
        } else {
            return redirect()->to(route_to('kriteria.pilihan', $id_kriteria))->with('error', 'Data pilihan kriteria gagal dihapus');             
        }
    }
}