<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kriteria;
use App\Models\Pendaftar;
use App\Models\Penilaian;
use App\Models\Pilihan;
use Config\Services;

class PenilaianController extends BaseController
{
    public function __construct()
    {
        $this->title = 'Penilaian';
        $this->pendaftar = new Pendaftar();
        $this->kriteria = new Kriteria();
        $this->penilaian = new Penilaian();
        $this->pilihan = new Pilihan();
        $this->services = new Services();

    }
    public function index()
    {
        $data['title'] = $this->title;
        $data['listPendaftar'] = $this->pendaftar->penilaianPendaftar();
        $data['jumlahKriteria'] = $this->kriteria->countAllResults();
        return view('penilaian/index', $data);
    }
    
    public function detail($id)
    {
        $data['title'] = $this->title;
        $data['pendaftar'] = $this->pendaftar->where('id', $id)->first();
        $data['listKriteria'] = $this->kriteria->findAll();
        $data['listPenilaian'] = $this->penilaian->where('id_pendaftar', $id)->findAll();
        $data['unSelected'] = $this->kriteria->unSelected($id);
        $data['listPilihan'] =  $this->pilihan->findAll();
        return view('penilaian/detail', $data);
    }

    public function store($id)
    {
        $jumlah = $this->request->getVar('nilai_kriteria');
        if ($jumlah == true && count($jumlah) == $this->kriteria->countAllResults())
        {
            // tangkap jumlah data
            $jumlahData = (count($this->request->getVar('nilai_kriteria'))) - 1;
            // panggil helper validasi input data
            $validation = $this->services::validation();
            for($i = 0; $i <= $jumlahData; $i++) {
                // Ambil data dari inputan
                $penilaian = [
                    'id_pendaftar' => $id,
                    'id_kriteria' => $this->request->getVar('id_kriteria')[$i],
                    'nilai_kriteria' => $this->request->getVar('nilai_kriteria')[$i],
                ];
                // Lakukan validasi
                $hasilValidasi = $validation->run($penilaian, 'penilaian');
    
                // Jika Gagal
                if (!$hasilValidasi) {
                    // Meneruskan data error dari validasi ke view
                    session()->setFlashdata('errors', $validation->getErrors());
                    // Redirect + pesan gagal
                    return redirect()->to(route_to('penilaian.detail', $id))->with('error', 'Data penilaian gagal disimpan');
                //jika validasi sukses
                } else {
                    // Simpan Data
                    $this->penilaian->save($penilaian);
                }
            }
            return redirect()->to(route_to('penilaian.detail', $id))->with('success', 'Data penilaian berhasil disimpan');
        } else {
            return redirect()->to(route_to('penilaian.detail', $id))->with('error', 'Semua data penilaian harus diisi');
        }
    }

    public function update($id)
    {
        // panggil helper validasi input data
        $validation = $this->services::validation();

        // Ambil data dari database
        $data = $this->penilaian->where('id', $id)->first();
        // Ambil data dari inputan
        $penilaian = [
            'id' => $id,
            'id_pendaftar' => $data['id_pendaftar'],
            'id_kriteria' => $data['id_kriteria'],
            'nilai_kriteria' => $this->request->getVar('nilai_kriteria'),
        ];
        // Lakukan validasi
        if($validation->run($penilaian, 'penilaian')) {
            //jika validasi sukses
            // Simpan Data
            $this->penilaian->save($penilaian, ['id' => $id]);
            // Redirect + pesan sukses
            return redirect()->to(route_to('penilaian.detail', $data['id_pendaftar']))->with('success', 'Data penilaian berhasil disimpan');
        } 
        // jika validasi gagal
        else {
            // Meneruskan data error dari validasi ke view
            session()->setFlashdata('errors', $validation->getErrors());
            // Redirect + pesan gagal
            return redirect()->to(route_to('penilaian.detail', $data['id_pendaftar']))->with('error', 'Data penilaian gagal disimpan');             
        }
    }

    public function delete($id)
    {
        $penilaian = $this->penilaian->where('id', $id)->first();
        $deleted = $this->penilaian->delete(['id' => $id]);
        if($deleted) {
            return redirect()->to(route_to('penilaian.detail', $penilaian['id_pendaftar']))->with('success', 'Data penilaian berhasil dihapus');
        } else {
            return redirect()->to(route_to('kriteria.detail', $penilaian['id_pendaftar']))->with('error', 'Data penilaian gagal dihapus');             
        }
    }

    public function reset()
    {
        $this->penilaian->emptyTable('penilaian');
        session()->setFlashdata('success', 'Data penilaian berhasil direset');
        return redirect()->to(route_to('dashboard.index'));
    }
}