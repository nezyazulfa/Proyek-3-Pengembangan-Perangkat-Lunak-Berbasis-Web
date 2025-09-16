<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        // Menampilkan halaman register
        return view('register');
    }

    public function attemptRegister()
    {
        // ++ TAMBAHAN: Aturan Validasi
        $rules = [
            'full_name' => 'required|min_length[3]',
            'username'  => 'required|min_length[5]|is_unique[users.username]', // is_unique memastikan username belum ada
            'password'  => 'required|min_length[6]',
        ];

        // ++ TAMBAHAN: Jalankan Validasi
        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembalikan ke form register dengan pesan error
            return redirect()->to('/register')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Jika validasi berhasil, lanjutkan proses penyimpanan
        $userModel = new UserModel();

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'username'  => $this->request->getPost('username'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'      => 'Mahasiswa', // Default role saat register
        ];

        $userModel->save($data);
        
        // ++ TAMBAHAN: Beri pesan sukses setelah registrasi
        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function login()
    {
        // Menampilkan halaman login
        return view('login');
    }

    public function attemptLogin()
    {
        // ++ TAMBAHAN: Aturan Validasi
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];
        
        // ++ TAMBAHAN: Jalankan Validasi
        if (!$this->validate($rules)) {
            return redirect()->to('/login')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Jika validasi berhasil, lanjutkan proses login
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Jika kredensial valid, simpan data ke session
            session()->set([
                'user_id'    => $user['user_id'],
                'username'   => $user['username'],
                'role'       => $user['role'],
                'isLoggedIn' => true
            ]);

            // Arahkan berdasarkan role
            if ($user['role'] == 'Admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/student/dashboard');
            }
        }

        // Jika login gagal
        return redirect()->to('/login')->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        // Hapus semua data session
        session()->destroy();
        return redirect()->to('/login');
    }
}