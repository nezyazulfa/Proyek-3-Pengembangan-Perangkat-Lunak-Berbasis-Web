<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>

    <h2>Tambah Mahasiswa Baru</h2>

    <form action="/tribuwono/store" method="post">
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim"><br><br>

        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br><br>

        <label for="jurusan">Jurusan:</label><br>
        <input type="text" id="jurusan" name="jurusan"><br><br>

        <input type="submit" value="Simpan">
    </form>

    <br>
    <a href="/tabel">Kembali ke Daftar</a>

</body>
</html>