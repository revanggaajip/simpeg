<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Berkas;
use Config\Services;

class BerkasController extends BaseController
{
    public $berkas;
    public $services;

    public function __construct()
    {
        $this->berkas = new Berkas();
        $this->services = new Services();
    }

    public function detail($id)
    {
        $data['listBerkas'] = $this->berkas->where('pengguna_id', $id)->findAll();
        $data['title'] = 'Berkas Pegawai';

        return view('berkas/index', $data);
    }

    public function store($id)
    {
        $validation = $this->services::validation();

        $file = $this->request->getFile('berkas');
        $fileName = $file->getRandomName();
        $file->move('berkas', $fileName);

        $berkas = [
            'nama' => $fileName,
            'pengguna_id' => session('id'),
            'keterangan' => $this->request->getVar('keterangan')
        ];

        if($validation->run($berkas, 'berkas')) {
            //jika validasi sukses
            // Simpan Data
            $this->berkas->save($berkas);
            // Redirect + pesan sukses
            return redirect()->to(route_to('berkas.detail', session('id')))->with('success', 'Data berkas berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('berkas.detail', session('id')))->with('error', 'Data berkas gagal disimpan');             
        }
    }
    public function update($id)
    {
        $validation = $this->services::validation();
        if ($this->request->getFile('berkas')->getError() == 4) {
            $fileName = $this->request->getVar('edit_berkas');
        } else {
            $file = $this->request->getFile('berkas');
            $fileName = $file->getRandomName();
            $file->move('berkas', $fileName);
            unlink('berkas/' . $this->request->getVar('edit_berkas'));
        }

        $berkas = [
            'id' => $id,
            'nama' => $fileName,
            'pengguna_id' => session('id'),
            'keterangan' => $this->request->getVar('keterangan')
        ];

        if($validation->run($berkas, 'berkas')) {
            //jika validasi sukses
            // Simpan Data
            $this->berkas->save($berkas);
            // Redirect + pesan sukses
            return redirect()->to(route_to('berkas.detail', session('id')))->with('success', 'Data berkas berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('berkas.detail', session('id')))->with('error', 'Data berkas gagal disimpan');             
        }
    }

    public function delete($id)
    {
        // Menghapus data
        $deleted = $this->berkas->delete(['id' => $id]);

        unlink('berkas/'. $this->request->getVar('delete_berkas'));
        // Jika berhasil terhapus
        if($deleted) {
            // Redirect + pesan sukses
            return redirect()->to(route_to('berkas.detail', session('id')))->with('success', 'Data berkas berhasil dihapus');
        // Jika gagal
        } else {
            // Redirect + pesan gagal
            return redirect()->to(route_to('berkas.detail', session('id')))->with('error', 'Data berkas gagal dihapus');             
        }
    }
}
