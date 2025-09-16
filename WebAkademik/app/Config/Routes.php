<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --------------------------------------------------------------------
// Rute Halaman Utama & Autentikasi (Publik)
// --------------------------------------------------------------------
$routes->get('/', 'Home::index');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::attemptRegister');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');


// --------------------------------------------------------------------
// Rute yang Dilindungi (Membutuhkan Login)
// --------------------------------------------------------------------
$routes->group('', ['filter' => 'auth'], static function ($routes) {

    /**
     * =================================================================
     * Grup Rute Khusus Admin
     * =================================================================
     */
    $routes->group('admin', ['filter' => 'role:Admin'], static function ($routes) {
        $routes->get('dashboard', 'AdminController::index');

        // Rute untuk Mata Kuliah tetap menggunakan resource
        $routes->resource('courses', ['controller' => 'Admin\CourseController']);
        
        // --- PERUBAHAN DI SINI ---
        // Rute untuk Mahasiswa diubah menjadi manual untuk mengatasi masalah
        
        // Rute untuk menampilkan semua mahasiswa (halaman utama)
        $routes->get('students', 'Admin\StudentController::index');
        // Rute untuk menampilkan form tambah baru
        $routes->get('students/new', 'Admin\StudentController::new');
        // Rute untuk memproses data dari form tambah baru
        $routes->post('students', 'Admin\StudentController::create');
        // Rute manual KHUSUS untuk hapus mahasiswa
        $routes->get('students/destroy/(:num)', 'Admin\StudentController::delete/$1');
        // Rute untuk menampilkan detail satu mahasiswa
        $routes->get('students/(:num)', 'Admin\StudentController::show/$1');
        // Rute untuk menampilkan form edit
        $routes->get('students/(:num)/edit', 'Admin\StudentController::edit/$1');
        // Rute untuk memproses update dari form edit
        $routes->post('students/(:num)', 'Admin\StudentController::update/$1');

    });

    /**
     * =================================================================
     * Grup Rute Khusus Mahasiswa
     * =================================================================
     */
    $routes->group('student', ['filter' => 'role:Mahasiswa'], static function ($routes) {
        $routes->get('dashboard', 'StudentController::index');
        $routes->get('courses', 'StudentController::viewCourses');
        $routes->post('enroll/(:num)', 'StudentController::enroll/$1');
        $routes->get('my-courses', 'StudentController::myCourses');
    });

});