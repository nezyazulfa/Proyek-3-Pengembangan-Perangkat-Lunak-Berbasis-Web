<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CourseModel;

class CourseController extends BaseController
{
    /**
     * Menampilkan daftar semua mata kuliah.
     */
    public function index()
    {
        $courseModel = new CourseModel();
        $data = [
            'courses' => $courseModel->findAll()
        ];
        return view('admin/courses/index', $data);
    }

    /**
     * Menampilkan form untuk menambah mata kuliah baru.
     */
    public function new()
    {
        return view('admin/courses/new');
    }

    /**
     * Memproses data dari form tambah baru dan menyimpannya.
     */
    public function create()
    {
        $courseModel = new CourseModel();
        $data = [
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits'),
        ];

        // Simpan data dan redirect kembali ke halaman utama
        $courseModel->save($data);
        return redirect()->to('/admin/courses')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit mata kuliah.
     */
    public function edit($id = null)
    {
        $courseModel = new CourseModel();
        $data = [
            'course' => $courseModel->find($id)
        ];
        return view('admin/courses/edit', $data);
    }

    /**
     * Memproses data dari form edit dan memperbaruinya.
     */
    public function update($id = null)
    {
        $courseModel = new CourseModel();
        $data = [
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits'),
        ];
        
        // Perbarui data di database
        $courseModel->update($id, $data);
        return redirect()->to('/admin/courses')->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    /**
     * Menghapus data mata kuliah.
     */
    public function delete($id = null)
    {
        $courseModel = new CourseModel();
        
        // Hapus data dari database
        $courseModel->delete($id);
        return redirect()->to('/admin/courses')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}