<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Tambah Mata Kuliah Baru</h1>
    <form action="/admin/courses" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="course_name">Nama Mata Kuliah</label>
            <input type="text" name="course_name" id="course_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="credits">Jumlah SKS</label>
            <input type="number" name="credits" id="credits" class="form-control" required>
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