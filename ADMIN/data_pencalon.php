<?php
// Panggil file koneksi
include "../SERVICE/koneksi.php";

// Query untuk mengambil data dari tabel kandidat
$sql = "SELECT id, nama, no_urut, jenis_kelamin, foto, visi_misi FROM kandidat"; // Sesuaikan dengan kolom yang ada di tabel Anda
$result = $conn->query($sql);

// Debugging jika query gagal
if (!$result) {
    die("Query gagal: " . $conn->error);
}

// Cek apakah parameter 'hapus_id' ada di URL
if (isset($_GET['hapus_id'])) {    
    $hapus_id = $conn->real_escape_string($_GET['hapus_id']);

    // Langkah 1: Hapus data terkait di tabel hasil
    $sql_delete_hasil = "DELETE FROM hasil WHERE id = '$hapus_id'";
    if (!$conn->query($sql_delete_hasil)) {
        echo "<script>alert('Gagal menghapus data dari tabel hasil: " . $conn->error . "');</script>";
    } else {
        // Langkah 2: Hapus data di tabel kandidat setelah data di tabel hasil dihapus
        $sql_delete_kandidat = "DELETE FROM kandidat WHERE id = '$hapus_id'";
        if ($conn->query($sql_delete_kandidat) === TRUE) {
            echo "<script>alert('Data berhasil dihapus!');</script>";
            header("Location: data_pencalon.php");
            exit();
        } else {
            echo "<script>alert('Gagal menghapus data dari tabel kandidat: " . $conn->error . "');</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kandidat</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../CSS/data_pencalon.css">

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
    <div class="sidebar" style="position:relative;">
        <ul>
            <li><a href="../ADMIN/dashboard.php"><i class="fa-brands fa-stack-overflow"></i>Dashboard<a></li>            
            <li><a href="../ADMIN/data_pemilih.php"><i class="fa-solid fa-pen-to-square"></i>Data Pemilih</a></li>
            <li><a href="../ADMIN/data_pencalon.php"><i class="fa-solid fa-web-awesome"></i>Data Pencalon</a></li>
            <li><a href="../ADMIN/hasil_pemilihan.php"><i class="fa-solid fa-hourglass-start"></i>Hasil Pemilihan</a></li>
            <li><a href="../USER/login.php"><i class="fa-solid fa-right-to-bracket"></i>Keluar</a></li>
        </ul>
    </div>
    <!-- Sidebar End -->
     
    <!-- margin-left: 200px; padding: 20px; width: calc(100% - 200px); position:absolute; top: 150px;" -->
    <!-- style="margin-left: 200px; padding: 20px; width: calc(100% - 200px); position:absolute; top: 150px;" -->
    
    
    <!-- Main Content -->
    <div class="container"style="margin-left: 200px; padding: 20px; width: calc(100% - 200px); position:absolute; top: 150px;">
      <div class="row">
        <h2>Data Kandidat</h2>
        <div class="card" >
          <div class="card-header">
            <a href="tambah_kandidat.php" class="btn btn-primary" >Tambah Data</a>
            <!-- <input type="text" id="searchInput" class="form-control w-25" placeholder="Search" style="position:absolute; left:735px; top:5px;"> -->
          </div>           

          <!-- Table -->
          <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered">
              <thead class="table-success">
                  <tr>
                      <th>ID</th>
                      <th>Nama Kandidat</th>
                      <th>No Urut</th>
                      <th>Jenis Kelamin</th>
                      <th>Foto Kandidat</th>
                      <th>Visi Misi</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  // Cek apakah hasil query tidak kosong
                  if ($result->num_rows > 0) {
                      // Loop melalui hasil query
                      while ($row = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['no_urut']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                          echo "<td><img src='uploads/". htmlspecialchars($row['foto']) . "' width='100' height='100'></td>";
                          echo "<td>" . htmlspecialchars($row['visi_misi']) . "</td>";
                          echo "<td><a href='data_pencalon.php?hapus_id=" . urlencode($row['id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Hapus</a></td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr><td colspan='7'>Tidak ada data.</td></tr>";
                  }
                  ?>
              </tbody>
          </table>
        </div>
      </div>
 
            
          </div>
          <!-- Table End -->
        </div>
      </div>
    </div>
    <!-- Main Content End -->
    
</body>
</html>
