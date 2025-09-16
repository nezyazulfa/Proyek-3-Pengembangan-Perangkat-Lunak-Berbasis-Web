<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Kelola Data Mahasiswa</h1>
    <a href="/admin/students/new" class="btn btn-primary">Tambah Mahasiswa Baru</a>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Tahun Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $student): ?>
            <tr>
                <td><?= $student['NIM'] ?></td>
                <td><?= $student['full_name'] ?></td>
                <td><?= $student['username'] ?></td>
                <td><?= $student['entry_year'] ?></td>
                <td>
                    <a href="/admin/students/<?= $student['user_id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="/admin/students/<?= $student['user_id'] ?>/edit" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/admin/students/destroy/<?= $student['user_id'] ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger btn-sm">Hapus</a>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    .btn { display: inline-block; padding: .5rem 1rem; margin-bottom: 1rem; font-size: 1rem; cursor: pointer; text-align: center; text-decoration: none; border-radius: .25rem; border: none; }
    .btn-primary { color: #fff; background-color: #007bff; }
    .btn-info { color: #fff; background-color: #17a2b8; }
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