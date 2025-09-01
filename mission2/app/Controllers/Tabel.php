<?php

namespace App\Controllers;

// 1. Panggil (use) Model yang akan digunakan
use App\Models\MahasiswaModel;

class Tabel extends BaseController
{
    public function index()
    {
        // 2. Buat object dari class MahasiswaModel
        $model = new MahasiswaModel();

        // 3. Panggil fungsi getMahasiswa() dari model
        $data['mahasiswa'] = $model->getMahasiswa();

        // 4. Kirim data ke view (langkah ini tidak berubah)
        return view('tabel_view', $data);
    }
}