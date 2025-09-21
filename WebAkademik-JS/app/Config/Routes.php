<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rute Halaman Utama & Autentikasi
$routes->get('/', 'Home::index');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::attemptRegister');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');

// Rute yang Dilindungi
$routes->group('', ['filter' => 'auth'], static function ($routes) {

    // Grup Rute Khusus Admin
    $routes->group('admin', ['filter' => 'role:Admin'], static function ($routes) {
        $routes->get('dashboard', 'AdminController::index');

        // --- Rute Manual untuk Courses (INI YANG BENAR) ---
        $routes->get('courses', 'Admin\CourseController::index');
        $routes->get('courses/new', 'Admin\CourseController::new');
        $routes->post('courses', 'Admin\CourseController::create');
        $routes->get('courses/destroy/(:num)', 'Admin\CourseController::delete/$1'); // Rute Hapus
        $routes->get('courses/(:num)', 'Admin\CourseController::show/$1');
        $routes->get('courses/(:num)/edit', 'Admin\CourseController::edit/$1');
        $routes->post('courses/(:num)', 'Admin\CourseController::update/$1');
        
        // --- Rute Manual untuk Students (INI YANG BENAR) ---
        $routes->get('students', 'Admin\StudentController::index');
        $routes->get('students/new', 'Admin\StudentController::new');
        $routes->post('students', 'Admin\StudentController::create');
        $routes->get('students/destroy/(:num)', 'Admin\StudentController::delete/$1'); // Rute Hapus
        $routes->get('students/(:num)', 'Admin\StudentController::show/$1');
        $routes->get('students/(:num)/edit', 'Admin\StudentController::edit/$1');
        $routes->post('students/(:num)', 'Admin\StudentController::update/$1');
    });

    // Grup Rute Khusus Mahasiswa
    $routes->group('student', ['filter' => 'role:Mahasiswa'], static function ($routes) {
        $routes->get('dashboard', 'StudentController::index');
        $routes->get('courses', 'StudentController::viewCourses');
        $routes->post('enroll/(:num)', 'StudentController::enroll/$1');
        $routes->get('my-courses', 'StudentController::myCourses');
    });
});