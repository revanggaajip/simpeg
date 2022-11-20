<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->pengguna = new Pengguna();
    }
    public function login()
    {
        return view('auth/login');
    }

    public function loginAction()
    {
        // Tangkap hasil inputan
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        // Cari data pengguna berdasarkan email yang diinput
        $pengguna = $this->pengguna->where('email', $email)->first();
        // Jika data pengguna ditemukan
        if ($pengguna) {
            // jika password yang diinput sesuai
            if (password_verify($password, $pengguna['password'])) {
                // Menyimpan data ke session
                $sessionData = [
                    'id' => $pengguna['id'],
                    'nama' => $pengguna['nama'],
                    'email' => $pengguna['email'],
                    'role' => $pengguna['role']
                ];
                session()->set($sessionData);
                // redirect ke halaman dashboard
                return redirect()->to(route_to('dashboard.index'));
            // Jika password yang diinput tidak sesuai
            } else {
                // redirect ke halaman login + pesan kesalahan
                return redirect()->back()->withInput()->with('error', 'Password salah / tidak sesuai');
            }
            // Jika data pengguna tidak ditemukan
        } else {
            // redirect ke halaman login + pesan kesalahan
            return redirect()->back()->withInput()->with('error', 'Username tidak ditemukan');
        }
    }

    public function editPassword()
    {
        // Judul
        $data['title'] = 'Edit Password';
        // tampilkan view editPassword
        return view('auth/editPassword', $data);
    }

    public function updatePassword()
    {
        // Ambil data inputan password lama
        $passwordLama = $this->request->getVar('password_lama');
        // Ambil data pengguna dari database
        $pengguna = $this->pengguna->where('id', session('id'))->first();
        // Jika inputan password lama sesuai dengan password dari pengguna
        if (password_verify($passwordLama, $pengguna['password'])) {
            // Ambil data inputan password baru
            $passwordBaru = $this->request->getVar('password_baru');
            // Ambil data inputan konfirmasi
            $konfirmPassword = $this->request->getVar('konfirm_password');
            // Jika inputan password baru tidak sesuai password lama
            if($passwordBaru != $konfirmPassword) {
                // redirect + pesan gagal
                return redirect()->to(route_to('password.edit'))->with('error', 'Konfirmasi Password Tidak Sesuai');
            // jika inputan password baru sesuai password lama
            } else {
                // update password
                $this->user->update(session('id'),[
                    'password' => password_hash($passwordBaru, PASSWORD_DEFAULT)
                ]);
                // redirect + pesan sukses
                return redirect()->to(route_to('password.edit'))->with('success', 'Password Berhasil Diubah');
            }
        // Jika inputan password lama tidak sesuai dengan password dari pengguna    
        } else {
            // Redirect + pesan error
            return redirect()->to(route_to('password.edit'))->with('error', 'Password Lama Tidak Sesuai');
        }
    }

    public function logout() 
    {
        // hapus session
        session()->remove('id');
        session()->remove('nama');
        session()->remove('role');
        // redirect login page
        return redirect()->to(route_to('login.index'));
    }
}