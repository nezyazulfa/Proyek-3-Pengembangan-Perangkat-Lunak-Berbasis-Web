<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    // Fungsi untuk mengambil semua data mahasiswa
    public function getMahasiswa()
    {
        return $this->db->query("SELECT * FROM mahasiswa")->getResultArray();
    }

    // Fungsi untuk mencari satu data mahasiswa berdasarkan ID
    public function findMahasiswa($id)
    {
        $query = $this->db->query("SELECT * FROM mahasiswa WHERE id = ?", [$id]);
        return $query->getRowArray();
    }

    // Fungsi baru untuk menyimpan data mahasiswa baru
    public function saveMahasiswa($data)
    {
        // Menggunakan Query Builder untuk INSERT data
        return $this->db->table('mahasiswa')->insert($data);
    }
}