<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
    <div class="container">
        <h1>Selamat Datang di Dashboard Mahasiswa!</h1>
        <p>Halo, <strong><?= session()->get('username') ?></strong>. Anda login sebagai <?= session()->get('role') ?>.</p>
        <hr>
        <p>Di sini Anda nanti bisa melihat daftar mata kuliah dan mengambil mata kuliah baru.</p>
    </div>
<?= $this->endSection() ?>