<?php
// Koneksi ke database
include "../SERVICE/koneksi.php"; // Pastikan file koneksi.php sudah benar

// Variabel untuk menyimpan pesan atau hasil
$message = "";
$message_data = "";
$total_users = 0;
$total_data = 0;

try {
    // Query untuk menghitung jumlah pengguna
    $query_count = "SELECT COUNT(*) AS total FROM register";
    $result_count = $conn->query($query_count);

    if ($result_count) {
        $data_count = $result_count->fetch_assoc();
        $total_users = $data_count['total'];
        $message ="<h2>$total_users</h2>";
    } else {
        $message = "Gagal menghitung jumlah pengguna: " . $conn->error;
    }
} catch (Exception $e) {
    $message = "Terjadi kesalahan: " . $e->getMessage();
}

try {
  // Query untuk menghitung jumlah kandidat
  $query_count = "SELECT COUNT(*) AS total FROM kandidat";
  $result_count = $conn->query($query_count);

  if ($result_count) {
      $data_count = $result_count->fetch_assoc();
      $total_data = $data_count['total'];
      $message_data ="<h2>$total_data</h2>";
  } else {
      $message_data = "Gagal menghitung jumlah kandidat: " . $conn->error;
  }
} catch (Exception $e) {
  $message_data = "Terjadi kesalahan: " . $e->getMessage();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../CSS/dashboard.css">

    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- CDN JAVASRIPT BOOTSTRAP -->
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
            <li><a href="dashboard.php"><i class="fa-brands fa-stack-overflow"></i>Dashboard<a></li>            
            <li><a href="data_pemilih.php"><i class="fa-solid fa-pen-to-square"></i>Data Pemilih</a></li>
            <li><a href="data_pencalon.php"><i class="fa-solid fa-web-awesome"></i>Data Pencalon</a></li>
            <li><a href="hasil_pemilihan.php"><i class="fa-solid fa-hourglass-start"></i>Hasil Pemilu</a></li>
            <li><a href="../USER/login.php"><i class="fa-solid fa-right-to-bracket"></i>Keluar</a></li>
        </ul>
    </div>
    <!-- Sidebar End -->
     

    <!-- Main Content -->
    <div class="headline">
      <h1>Selamat Datang di E-Coblos</h1>
        <!-- <hr color="red"> -->
    </div>
    
    <!-- Content 1  -->
    <div class="row col-8">
      <div class="col-sm-6">
        <div class="card">
          <h5 class="card-header">Total Pemilih</h5>
          <div class="card-body">
            <h5 class="card-title">Hasil Data Pemilih</h5>
            <p class="card-text"><?php if ($total_users > 0): ?>
            <div class="result"><?= $message ?></div>
            <?php else: ?>
            <div class="error"><?= $message ?></div>
            <?php endif; ?></p>
            <a href="data_pemilih.php" class="btn btn-outline-success">Lihat</a>
          </div>
        </div>
      </div>
    <!-- Content 1 End  -->

    <!-- Content 2  -->
    <div class="col-sm-6">
       <div class="card">
        <h5 class="card-header">Total Candidat</h5>
        <div class="card-body">

          <h5 class="card-title">Hasil Data Kandidat</h5>
          <p class="card-text"><?php if ($total_data > 0): ?>
          <div class="result"><?= $message_data ?></div>
          <?php else: ?>
          <div class="error"><?= $message_data ?></div>
          <?php endif; ?></p>
          <a href="data_pencalon.php" class="btn btn-outline-info">Lihat</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Content 2 End -->

</body>
</html>
