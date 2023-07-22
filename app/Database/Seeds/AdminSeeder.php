<?php

namespace App\Database\Seeds;

use App\Models\Pengguna;
use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $pengguna = new Pengguna();
        $pengguna->save([
            'nip' => '123',
            'nik' => '3325',
            'nama' => 'admin',
            'jenis_kelamin'=> 'Laki-laki',
            'tempat_lahir' => 'pluto',
            'tanggal_lahir' => '2000/01/01',
            'alamat' => 'Planet Namex',
            'agama' => 'Islam',
            'jabatan' => 'Big Boss',
            'npwp' => '123',
            'mulai_kerja' => '2000/01/01',
            'gaji' => '500000',
            'password' => password_hash('password', PASSWORD_DEFAULT),
            'role' => 'admin'
        ]);
    }
}