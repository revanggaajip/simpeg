<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kriteria;
use App\Models\Pendaftar;
use App\Models\Penilaian;
use App\Models\SeleksiDetail;
use App\Models\SeleksiHeader;

class PerhitunganController extends BaseController
{
    public function index()
    {
        $pendaftar = new Pendaftar();
        $kriteria = new Kriteria();
        $penilaian = new Penilaian();
        $jumlahPenilaian = $penilaian->countAll();
        $jumlahData = $pendaftar->where('status', 'aktif')->countAllResults() * $kriteria->countAll();
        if($jumlahPenilaian != $jumlahData) {
            return redirect()->to(route_to('penilaian.index'))->with('error', 'Data penilaian belum lengkap');
        }

        if(!(session('nama_program') && session('jumlah_kuota'))){
            return redirect()->to(route_to('perhitungan.create'));
        }

        foreach ($kriteria->findAll() as $criteria) {
            $x[$criteria['id']] = [];
            foreach ($penilaian->findAll() as $score) {
                if ($score['id_kriteria'] == $criteria['id']) {
                    array_push($x[$criteria['id']], $score['nilai_kriteria']);
                }
            }
        }

        foreach ($kriteria->findAll() as $criteria) {
            if ($criteria['status'] == 'Benefit') {
                $comparison[$criteria['id']] = max($x[$criteria['id']]);
            } else {
                $comparison[$criteria['id']] = min($x[$criteria['id']]);
            }
        }
        
        foreach ($penilaian->findAll() as $score) {
            foreach ($pendaftar->findAll() as $registrant) {
                if ($score['id_pendaftar'] == $registrant['id']) {
                    foreach ($kriteria->findAll() as $criteria) {
                        if ($score['id_kriteria'] == $criteria['id']) {
                            if ($criteria['status'] == 'Benefit') {
                                $calculation[$registrant['id']] [$criteria['id']] = number_format($score['nilai_kriteria'] / $comparison[$criteria['id']] , 2);
                            } else {
                                $calculation[$registrant['id']] [$criteria['id']] = number_format($comparison[$criteria['id']]  / $score['nilai_kriteria'] , 2);
                            }
                        }
                    }
                }
            }
        }

        foreach ($calculation as $calRegistrant => $calCriteria) {
            foreach ($pendaftar->findAll() as $registrant) {
                if ($calRegistrant == $registrant['id']) {
                    foreach ($kriteria->findAll() as $criteria) {
                        foreach ($calCriteria as $cc => $calScore)
                        if ($cc == $criteria['id']) {
                            $result[$registrant['id']][$criteria['id']] = $calScore * $criteria['bobot'] * 0.01;
                        }
                    }
                }
            }
        }

        foreach ($result as $i => $r) {
            $sumResult[$i] = number_format(array_sum($r), 3);
            $noKeyResult[] = number_format(array_sum($r), 3);
            $selectionResult[] = number_format(array_sum($r), 3);
        }
        rsort($selectionResult);

        $data['title'] = 'Perhitungan';
        $data['listPendaftar'] = $pendaftar->where('status', 'aktif')->findAll();
        $data['listKriteria'] = $kriteria->findAll();
        $data['listPenilaian'] = $penilaian->findAll();
        $data['x'] = $x;
        $data['comparison'] = $comparison;
        $data['calculation'] = $calculation;
        $data['sumResult'] = $sumResult;
        $data['selectionResult'] = $selectionResult;

        return view('perhitungan/index', $data);
    }

    public function create()
    {
        if(session('nama_program') && session('jumlah_kuota')){
            return redirect()->to(route_to('perhitungan.index'));
        }
        $data['validation'] = \Config\Services::validation();
        $data['title'] = 'Informasi Bantuan';
        return view('perhitungan/create', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $sessionData = [
            'nama_program' => $this->request->getVar('nama')." ".$this->request->getVar('bulan')." ".$this->request->getVar('tahun'),
            'jumlah_kuota' => $this->request->getVar('kuota')
        ];
        if($validation->run($sessionData, 'perhitungan')) {
        session()->set($sessionData);
        return redirect()->to(route_to('perhitungan.index'));
        }
    }

    public function reset()
    {
        session()->remove('nama_program');
        session()->remove('jumlah_kuota');

        return redirect()->to(route_to('perhitungan.create'));
    }

    public function selection()
    {
        $seleksiHeader = new SeleksiHeader();
        $seleksiDetail = new SeleksiDetail();

        $seleksiHeader->save([
            'nama' => session('nama_program'),
            'kuota' => session('jumlah_kuota')
        ]);
        $idSeleksiHeader = $seleksiHeader->insertID();
        $jumlahData = count($this->request->getVar('id'));
        for ($i=0; $i < $jumlahData; $i++) { 
            $seleksiDetail->insert([
                'id_pendaftar' => $this->request->getVar('id')[$i],
                'id_seleksi_header' => $idSeleksiHeader,
                'nama' => $this->request->getVar('nama')[$i],
                'nilai' => $this->request->getVar('nilai')[$i],
                'penerima' => $this->request->getVar('penerima')[$i],
            ]);
        }
        $this->reset();
        $penilaian = new PenilaianController();
        $penilaian->reset();

        return redirect()->to(route_to('dashboard.index'))->with('success', 'Data seleksi berhasil disimpan');

    }
}