<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Tribuwono extends BaseController
{
    // Method untuk menampilkan detail satu mahasiswa
    public function detail($id)
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->findMahasiswa($id);

        if (empty($data['mahasiswa'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mahasiswa tidak ditemukan');
        }

        return view('detail_view', $data);
    }

    // Method untuk menampilkan halaman form tambah data
    public function create()
    {
        return view('create_view');
    }

    // Method baru untuk memproses data dari form dan menyimpannya
    public function store()
    {
        $model = new MahasiswaModel();

        // Mengambil data dari form
        $data = [
            'nim'     => $this->request->getPost('nim'),
            'nama'    => $this->request->getPost('nama'),
            'jurusan' => $this->request->getPost('jurusan'),
        ];

        // Memanggil fungsi baru di model untuk insert
        $model->saveMahasiswa($data);

        // Mengarahkan pengguna kembali ke halaman tabel
        return redirect()->to('/tabel');
    }
}