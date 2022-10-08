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
                return redirect()->to(route_to('login.index'))->withInput()->with('error', 'Password salah / tidak sesuai');
            }
            // Jika data pengguna tidak ditemukan
        } else {
            // redirect ke halaman login + pesan kesalahan
            return redirect()->to(route_to('login.index'))->withInput()->with('user', 'Username tidak ditemukan');
        }
    }

    public function logout() 
    {
        session()->remove('id');
        session()->remove('nama');
        session()->remove('role');
        return redirect()->to(route_to('login.index'));
    }
}