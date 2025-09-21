<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CourseModel;

class CourseController extends BaseController
{
    public function index()
    {
        $courseModel = new CourseModel();
        $data['courses'] = $courseModel->findAll();
        return view('admin/courses/index', $data);
    }

    /**
     * Menampilkan detail satu mata kuliah. (FUNGSI BARU)
     */
    public function show($id = null)
    {
        $courseModel = new CourseModel();
        $data['course'] = $courseModel->find($id);
        
        // Jika data tidak ditemukan, tampilkan error 404
        if (empty($data['course'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mata kuliah tidak ditemukan.');
        }

        return view('admin/courses/show', $data);
    }

    public function new()
    {
        return view('admin/courses/new');
    }

    public function create()
    {
        $courseModel = new CourseModel();
        $data = [
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits'),
        ];
        $courseModel->save($data);
        return redirect()->to('/admin/courses')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function edit($id = null)
    {
        $courseModel = new CourseModel();
        $data['course'] = $courseModel->find($id);
        return view('admin/courses/edit', $data);
    }

    public function update($id = null)
    {
        $courseModel = new CourseModel();
        $data = [
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits'),
        ];
        $courseModel->update($id, $data);
        return redirect()->to('/admin/courses')->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    public function delete($id = null)
    {
        $courseModel = new CourseModel();
        $courseModel->delete($id);
        return redirect()->to('/admin/courses')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}