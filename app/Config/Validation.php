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

    public $pengguna = [
        'nama' => 'required',
        'nip' => 'required|is_unique[pengguna.nip,id,{id}]',
        'nik' => 'required|is_unique[pengguna.nik,id,{id}]',
        'jenis_kelamin' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'agama' => 'required',
        'jabatan' => 'required',
        'mulai_kerja' => 'required',
        'password' => 'required',
    ];

    public $cuti = [
        'mulai' => 'required',
        'akhir' => 'required',
        'alasan' => 'required'
    ];

    public $jabatan = [
        'nama' => 'required',
        'awal' => 'required',
        'akhir' => 'required'
    ];

    public $keluarga = [
        'nama' => 'required',
        'tanggal_lahir' => 'required',
        'hubungan' => 'required'
    ];

    public $pendidikan = [
        'nama' => 'required',
        'masuk' => 'required',
        'lulus' => 'required',
        'tingkatan' => 'required'
    ];
}