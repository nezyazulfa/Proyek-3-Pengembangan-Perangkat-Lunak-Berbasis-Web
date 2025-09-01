<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Mahasiswa</title>
</head>
<body>

    <h1>Detail Mahasiswa</h1>
    <ul>
        <li>NIM: <?= $mahasiswa['nim']; ?></li>
        <li>Nama: <?= $mahasiswa['nama']; ?></li>
        <li>Jurusan: <?= $mahasiswa['jurusan']; ?></li>
    </ul>
    <a href="/tabel">Kembali ke Daftar</a>

</body>
</html>