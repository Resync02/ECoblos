<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Coblos</title>
    
    <!-- Link CSS -->
    <link rel="stylesheet" href="CSS/register.css">
    <!-- CSS End -->

</head>

<div class="container">
        <div class="header">
            <h1>Selamat Datang di Website E-Coblos</h1>
        </div>
        <form action="register.php" method="POST">
            <input type="text" name="nik" placeholder="NIK" required>
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required>
            <select name="jenis_kelamin" required>
                <option value="">Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <input type="tel" name="no_telp" placeholder="No. Telepon" required>
            <input type="text" name="provinsi" placeholder="Provinsi" required>
            <input type="text" name="kota" placeholder="Kota" required>
            <input type="text" name="kecamatan" placeholder="Kecamatan" required>
            <input type="text" name="kelurahan" placeholder="Kelurahan" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="password" name="password" placeholder="Kata Sandi" required>
            <input type="text" name="pertanyaan_lupa_password" placeholder="Apa Makanan Kesukaan Anda?" required>
            <button type="submit">Daftar Sekarang</button>
        </form>
        <div class="footer">
            <p>© 2024 E-Coblos</p>
        </div>
    </div>