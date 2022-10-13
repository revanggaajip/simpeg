<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $kriteria = [
        'id' => 'required',
        'nama' => 'required|is_unique[kriteria.nama,id,{id}]',
        'bobot' => 'required',
        'status' => 'required'
    ];

    public $pendaftar = [
        'nik' => 'required|is_unique[pendaftar.nik,id,{id}]|numeric',
        'nama' => 'required',
        'alamat' => 'required',
        'status' => 'required'
    ];

    public $pengguna = [
        'nama' => 'required',
        'email' => 'required|valid_email|is_unique[pengguna.email,id,{id}]',
        'password' => 'required'
    ];

    public $penilaian = [
        'id_kriteria' => 'required',
        'nilai_kriteria' => 'required',
    ];

    public $pilihan = [
        'nama' => 'required',
        'bobot' => 'required',
        'id_kriteria' => 'required'
    ];
}