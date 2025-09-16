<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Kelola Mata Kuliah</h1>
    <a href="/admin/courses/new" class="btn btn-primary mb-3">Tambah Mata Kuliah Baru</a>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($courses as $course): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $course['course_name'] ?></td>
                <td><?= $course['credits'] ?></td>
                <td>
                    <a href="/admin/courses/<?= $course['course_id'] ?>/edit" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/admin/courses/<?= $course['course_id'] ?>/delete" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    .btn { display: inline-block; padding: .5rem 1rem; margin-bottom: 1rem; font-size: 1rem; cursor: pointer; text-align: center; text-decoration: none; border-radius: .25rem; }
    .btn-primary { color: #fff; background-color: #007bff; }
    .btn-warning { color: #212529; background-color: #ffc107; }
    .btn-danger { color: #fff; background-color: #dc3545; }
    .btn-sm { padding: .25rem .5rem; font-size: .875rem; }
    .alert { padding: 1rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem; }
    .alert-success { color: #155724; background-color: #d4edda; }
    .table { width: 100%; border-collapse: collapse; }
    .table th, .table td { padding: .75rem; border-top: 1px solid #dee2e6; text-align: left; }
    .table thead th { border-bottom: 2px solid #dee2e6; }
</style>
<?= $this->endSection() ?>