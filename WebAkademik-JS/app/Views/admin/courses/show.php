<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <a href="/admin/courses" class="btn btn-secondary mb-3">Kembali ke Daftar Mata Kuliah</a>
    <h1>Detail Mata Kuliah</h1>

    <p><strong>ID Mata Kuliah:</strong> <?= $course['course_id'] ?></p>
    <p><strong>Nama Mata Kuliah:</strong> <?= $course['course_name'] ?></p>
    <p><strong>Jumlah SKS:</strong> <?= $course['credits'] ?></p>

</div>

<style>
    .btn { display: inline-block; padding: .5rem 1rem; margin-bottom: 1rem; font-size: 1rem; cursor: pointer; text-align: center; text-decoration: none; border-radius: .25rem; border: none; }
    .btn-secondary { color: #fff; background-color: #6c757d; }
</style>
<?= $this->endSection() ?>