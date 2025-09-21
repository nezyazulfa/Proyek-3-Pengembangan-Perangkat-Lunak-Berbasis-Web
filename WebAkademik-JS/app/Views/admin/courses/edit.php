<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Edit Mata Kuliah</h1>
    <form action="/admin/courses/<?= $course['course_id'] ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT"> <div class="form-group">
            <label for="course_name">Nama Mata Kuliah</label>
            <input type="text" name="course_name" id="course_name" class="form-control" value="<?= $course['course_name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="credits">Jumlah SKS</label>
            <input type="number" name="credits" id="credits" class="form-control" value="<?= $course['credits'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>

<style>
    .form-group { margin-bottom: 1rem; }
    .form-control { display: block; width: 100%; padding: .375rem .75rem; font-size: 1rem; border: 1px solid #ced4da; border-radius: .25rem; }
    .btn { padding: .5rem 1rem; font-size: 1rem; cursor: pointer; border-radius: .25rem; border: none;}
    .btn-primary { color: #fff; background-color: #007bff; }
</style>
<?= $this->endSection() ?>