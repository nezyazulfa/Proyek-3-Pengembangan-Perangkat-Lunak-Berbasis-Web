<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <h1>Mata Kuliah yang Saya Ambil</h1>
    <p>Berikut adalah daftar mata kuliah yang telah Anda enroll.</p>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Mata Kuliah</th>
                <th scope="col">SKS</th>
                <th scope="col">Tanggal Ambil</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($my_courses)): ?>
                <tr>
                    <td colspan="4" style="text-align: center;">Anda belum mengambil mata kuliah apapun.</td>
                </tr>
            <?php else: ?>
                <?php $i = 1; ?>
                <?php foreach($my_courses as $course): ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td><?= $course['course_name'] ?></td>
                    <td><?= $course['credits'] ?></td>
                    <td><?= $course['enroll_date'] ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<style>
    .table { width: 100%; margin-bottom: 1rem; color: #212529; border-collapse: collapse; }
    .table th, .table td { padding: .75rem; vertical-align: top; border-top: 1px solid #dee2e6; }
    .table thead th { vertical-align: bottom; border-bottom: 2px solid #dee2e6; }
</style>
<?= $this->endSection() ?>