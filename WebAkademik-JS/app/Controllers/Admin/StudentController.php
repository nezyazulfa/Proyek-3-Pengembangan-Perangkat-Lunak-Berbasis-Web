<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\StudentModel;
use App\Models\TakesModel;

class StudentController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['students'] = $userModel
            ->select('users.user_id, users.full_name, users.username, students.NIM, students.entry_year')
            ->join('students', 'students.student_id = users.user_id')
            ->where('users.role', 'Mahasiswa')
            ->findAll();
        return view('admin/students/index', $data);
    }

    public function show($id = null)
    {
        $userModel = new UserModel();
        $studentModel = new StudentModel();
        $takesModel = new TakesModel();
        $data = [
            'student'      => $userModel->find($id),
            'student_data' => $studentModel->find($id),
            'takenCourses' => $takesModel
                ->select('courses.course_name, courses.credits, takes.enroll_date')
                ->join('courses', 'courses.course_id = takes.course_id')
                ->where('takes.student_id', $id)
                ->findAll()
        ];
        return view('admin/students/show', $data);
    }

    public function new()
    {
        return view('admin/students/new');
    }

    public function create()
    {
        $userModel = new UserModel();
        $studentModel = new StudentModel();
        $userData = [
            'full_name' => $this->request->getPost('full_name'),
            'username'  => $this->request->getPost('username'),
            'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'      => 'Mahasiswa',
        ];
        $userModel->save($userData);
        $userId = $userModel->getInsertID();
        $studentData = [
            'student_id' => $userId,
            'NIM'        => $this->request->getPost('NIM'),
            'entry_year' => $this->request->getPost('entry_year'),
        ];
        $studentModel->save($studentData);
        return redirect()->to('/admin/students')->with('success', 'Mahasiswa baru berhasil ditambahkan.');
    }

    public function edit($id = null)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.user_id, users.full_name, users.username, students.NIM, students.entry_year');
        $builder->join('students', 'students.student_id = users.user_id');
        $builder->where('users.user_id', $id);
        $query = $builder->get();
        $data['student'] = $query->getRowArray();
        return view('admin/students/edit', $data);
    }

    public function update($id = null)
    {
        $userModel = new UserModel();
        $studentModel = new StudentModel();
        $userData = [
            'full_name' => $this->request->getPost('full_name'),
            'username'  => $this->request->getPost('username'),
        ];
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $userModel->update($id, $userData);
        $studentData = [
            'NIM'        => $this->request->getPost('NIM'),
            'entry_year' => $this->request->getPost('entry_year'),
        ];
        $studentModel->update($id, $studentData);
        return redirect()->to('/admin/students')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function delete($id = null)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        return redirect()->to('/admin/students')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}