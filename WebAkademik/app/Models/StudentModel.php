<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table            = 'students';
    protected $primaryKey       = 'student_id';

    // Baris ini sangat penting!
    // Memberitahu model bahwa primary key (student_id) tidak diisi otomatis oleh tabel ini.
    protected $useAutoIncrement = false;

    protected $allowedFields    = ['student_id', 'NIM', 'entry_year'];
}