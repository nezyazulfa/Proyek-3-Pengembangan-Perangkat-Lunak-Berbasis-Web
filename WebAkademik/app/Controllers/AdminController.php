<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    /**
     * Menampilkan halaman dashboard untuk admin.
     */
    public function index()
    {
        // Perintah ini akan memuat file view yang berlokasi di
        // 'app/Views/admin/dashboard.php'
        return view('admin/dashboard');
    }
}