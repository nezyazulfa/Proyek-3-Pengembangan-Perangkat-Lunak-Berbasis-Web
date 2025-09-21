<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\TakesModel;

class StudentController extends BaseController
{
    /**
     * Menampilkan halaman dashboard untuk mahasiswa.
     */
    public function index()
    {
        return view('student/dashboard');
    }

    /**
     * =================================================================
     * FUNGSI: Menampilkan daftar semua mata kuliah
     * =================================================================
     */
    public function viewCourses()
    {
        // 1. Buat instance dari CourseModel
        $courseModel = new CourseModel();

        // 2. Siapkan data untuk dikirim ke view
        $data = [
            // Ambil semua data dari tabel 'courses' dan simpan ke dalam variabel 'courses'
            'courses' => $courseModel->findAll() 
        ];

        // 3. Tampilkan view dan kirimkan datanya
        return view('student/view_courses', $data);
    }

    /**
     * =================================================================
     * FUNGSI: Memproses pendaftaran mata kuliah
     * =================================================================
     */
    public function enroll($course_id)
    {
        // 1. Buat instance dari TakesModel
        $takesModel = new TakesModel();

        // 2. Siapkan data yang akan disimpan ke tabel 'takes'
        $data = [
            'student_id' => session()->get('user_id'), // Ambil ID mahasiswa dari session
            'course_id'  => $course_id,               // Ambil ID mata kuliah dari URL
            'enroll_date'=> date('Y-m-d')             // Tanggal hari ini
        ];

        // 3. Simpan data ke database
        $takesModel->save($data);

        // 4. Redirect kembali ke halaman daftar mata kuliah dengan pesan sukses
        return redirect()->to('/student/courses')->with('success', 'Anda berhasil mengambil mata kuliah!');
    }

    /**
     * =================================================================
     * FUNGSI BARU: Menampilkan mata kuliah yang sudah diambil
     * =================================================================
     */
    public function myCourses()
    {
        // 1. Ambil ID mahasiswa yang sedang login dari session
        $student_id = session()->get('user_id');

        // 2. Buat instance dari TakesModel
        $takesModel = new TakesModel();

        // 3. Ambil data dari database dengan menggabungkan (join) tabel
        $myCourses = $takesModel
            ->select('courses.course_name, courses.credits, takes.enroll_date') // Pilih kolom yang mau ditampilkan
            ->join('courses', 'courses.course_id = takes.course_id') // Gabungkan dengan tabel courses
            ->where('takes.student_id', $student_id) // Filter hanya untuk mahasiswa ini
            ->findAll();

        // 4. Siapkan data untuk dikirim ke view
        $data = [
            'my_courses' => $myCourses
        ];

        // 5. Tampilkan view dan kirimkan datanya
        return view('student/my_courses', $data);
    }
}