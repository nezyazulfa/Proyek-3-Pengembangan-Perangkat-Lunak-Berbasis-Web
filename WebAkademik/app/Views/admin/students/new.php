<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Tambah Mahasiswa Baru</h1>
    <form action="/admin/students" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="NIM">NIM</label>
            <input type="text" name="NIM" id="NIM" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="full_name">Nama Lengkap</label>
            <input type="text" name="full_name" id="full_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="entry_year">Tahun Masuk</label>
            <input type="number" name="entry_year" id="entry_year" class="form-control" placeholder="Contoh: 2023" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<style>
    .form-group { margin-bottom: 1rem; }
    .form-control { display: block; width: 100%; padding: .375rem .75rem; font-size: 1rem; border: 1px solid #ced4da; border-radius: .25rem; }
    .btn { padding: .5rem 1rem; font-size: 1rem; cursor: pointer; border-radius: .25rem; border: none;}
    .btn-primary { color: #fff; background-color: #007bff; }
</style>
<?= $this->endSection() ?>