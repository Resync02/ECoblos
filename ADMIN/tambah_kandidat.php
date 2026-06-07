<?php
include "../SERVICE/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nama = isset($_POST['nama']) ? $_POST['nama'] : null;
    $no_urut = isset($_POST['no_urut']) ? $_POST['no_urut'] : null;
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : null;
    $foto = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : null;
    $visi_misi = isset($_POST['visi_misi']) ? $_POST['visi_misi'] : null;

    // Periksa apakah ID ada di tabel hasil
    $check_query = "SELECT id FROM hasil WHERE id = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("i", $id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    

    if ($result->num_rows === 0) {
        // Jika ID tidak ada, tambahkan data ke tabel hasil
        $insert_hasil_query = "INSERT INTO hasil (id) VALUES (?)";
        $insert_hasil_stmt = $conn->prepare($insert_hasil_query);
        $insert_hasil_stmt->bind_param("i", $id);

        $insert_hasil_stmt->execute();
        $insert_hasil_stmt->close();
    }

    // Upload file foto
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);
    move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);

    // Masukkan data ke tabel kandidat
    $query = "INSERT INTO kandidat (id, nama, jenis_kelamin, no_urut, foto, visi_misi)
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("ississ", $id, $nama, $jenis_kelamin, $no_urut, $foto, $visi_misi);
        $stmt->execute();
        echo "<script>alert('Data berhasil!');</script>";
        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kandidat</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../CSS/tambah_kandidat.css">

    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- CDN JAVASCRIPT BOOSTRAP  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

    <!-- CDN JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <div class="left">
                <img src="../IMG/header/logo.png" alt="../IMG/header/logo.png">
                <span>E-Coblos</span>
        </div>
        
        <!-- Headline -->
        <div class="center">
            <h1>Saatnya Indonesia Memilih</h1>
        </div>
  
        <!-- Profile Accound -->
        <div class="right">
            <button onclick="window.location.href='profil.php'">
                <img src="../IMG/header/profil.png" alt="profil">
            </button>
        </div>
    </div>
    <!-- Header End -->

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <ul>
            <li><a href="../ADMIN/dashboard.php"><i class="fa-brands fa-stack-overflow"></i>Dashboard<a></li>            
            <li><a href="../ADMIN/tambah_kandidat.php"><i class="fa-solid fa-pen-to-square"></i>Data Pemilih</a></li>
            <li><a href="../ADMIN/data_pencalon.php"><i class="fa-solid fa-web-awesome"></i>Data Pencalon</a></li>
            <li><a href="../ADMIN/hasil_pemilihan.php"><i class="fa-solid fa-hourglass-start"></i>Hasil Pemilihan</a></li>
            <li><a href="../USER/login.php"><i class="fa-solid fa-right-to-bracket"></i>Keluar</a></li>
        </ul>
    </div>
    <!-- Sidebar End -->
     

    <!-- Main Content -->
    <div class="container-sm" style="margin-left: 200px; padding: 20px; width: calc(100% - 200px); position:absolute; top: 150px;">
        <h2>Data Kandidat</h2>
            <div class="form-container">
                <form action="tambah_kandidat.php" method="post" enctype="multipart/form-data">
                    <div class="row">

                    <div class="col-md-5" style="padding: 10px;">
                        <label for="id">No ID Kandidat</label>
                        <select class="form-select" id="id" name="id" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="col-md-5" style="padding: 10px;">
                        <label for="nama">Nama Kandidat</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    
                    <div class="col-md-5">
                        <label for="no_urut">No Urut</label>
                        <select class="form-select" id="no_urut" name="no_urut" required>
                            <option value="">Pilih No Urut</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <div class="col-md-5">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>



                    <div class="col-md-10" style="padding: 10px;">
                        <label for="foto">Foto Kandidat</label>
                        <input type="file" class="form-control" id="foto" name="foto" required>
                        <small>Format gambar: JPG, JPEG, PNG. Ukuran gambar: Max 2MB.</small><br>
                        <small>Jika kandidat baru, upload foto kandidat yang baru.</small> <br>
                        <small>*Foto yang diupload harus ukuran 16:9</small>
                    </div>

                    <div class="col-md-10"style="padding: 10px;">
                        <label for="visi_misi">Visi Misi</label>
                        <textarea class="form-control" id="visi_misi" name="visi_misi" rows="10" required></textarea>
                    </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px; padding: 5px 10px; font-size: 12px; border-radius: 3px; width: 20%;">Submit</button>
                    </div>
                </form>
            </div>
    </div>
                
<body>    
</html>
