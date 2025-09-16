<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <a href="/admin/students" class="btn btn-secondary mb-3">Kembali ke Daftar Mahasiswa</a>
    <h1>Detail Mahasiswa</h1>

    <p><strong>Nama Lengkap:</strong> <?= $student['full_name'] ?></p>
    <p><strong>Username:</strong> <?= $student['username'] ?></p>
    <p><strong>NIM:</strong> <?= $student_data['NIM'] ?? 'N/A' ?></p>
    <p><strong>Tahun Masuk:</strong> <?= $student_data['entry_year'] ?? 'N/A' ?></p>
    
    <hr>

    <h3>Mata Kuliah yang Diambil:</h3>
    <?php if (empty($takenCourses)): ?>
        <p>Mahasiswa ini belum mengambil mata kuliah apapun.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Tanggal Ambil</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach($takenCourses as $course): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $course['course_name'] ?></td>
                    <td><?= $course['credits'] ?></td>
                    <td><?= $course['enroll_date'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<style>
    .btn { display: inline-block; padding: .5rem 1rem; margin-bottom: 1rem; font-size: 1rem; cursor: pointer; text-align: center; text-decoration: none; border-radius: .25rem; border: none; }
    .btn-secondary { color: #fff; background-color: #6c757d; }
    .table { width: 100%; border-collapse: collapse; margin-top: 1rem;}
    .table th, .table td { padding: .75rem; border-top: 1px solid #dee2e6; text-align: left; }
    .table thead th { border-bottom: 2px solid #dee2e6; }
</style>
<?= $this->endSection() ?>