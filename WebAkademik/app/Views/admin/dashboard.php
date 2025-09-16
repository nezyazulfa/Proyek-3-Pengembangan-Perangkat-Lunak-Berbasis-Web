<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
    <div class="container">
        <h1>Selamat Datang di Dashboard Admin!</h1>
        <p>Halo, <strong><?= session()->get('username') ?></strong>. Anda login sebagai <?= session()->get('role') ?>.</p>
        <hr>
        <p>Melalui menu navigasi di atas, Anda dapat mengelola data mata kuliah dan data mahasiswa.</p>
    </div>
<?= $this->endSection() ?>