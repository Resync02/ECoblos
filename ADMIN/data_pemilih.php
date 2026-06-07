<?php
// Panggil file koneksi
include "../SERVICE/koneksi.php";

// Query untuk mengambil data
$sql = "SELECT nik, nama, tanggal_lahir, jenis_kelamin, no_telepon, alamat FROM register"; // Ganti "data_pemilih" sesuai dengan nama tabel Anda
$result = $conn->query($sql);

// Debugging jika query gagal
if (!$result) {
    die("Query gagal: " . $conn->error);
}

// Cek apakah parameter 'hapus_nik' ada di URL
if (isset($_GET['hapus_nik'])) {    
    $hapus_nik = $conn->real_escape_string($_GET['hapus_nik']);

    // Query untuk menghapus data berdasarkan NIK di tabel register
    $sql_delete_register = "DELETE FROM register WHERE nik = '$hapus_nik'";
    $sql_delete_login = "DELETE FROM login_user WHERE nik = '$hapus_nik'"; // Hapus juga di tabel login_user

    // Mulai transaksi
    $conn->begin_transaction();

    try {
        // Eksekusi query untuk menghapus data dari register
        if (!$conn->query($sql_delete_register)) {
            throw new Exception("Gagal menghapus data dari register: " . $conn->error);
        }

        // Eksekusi query untuk menghapus data dari login_user
        if (!$conn->query($sql_delete_login)) {
            throw new Exception("Gagal menghapus data dari login_user: " . $conn->error);
        }

        // Commit transaksi jika berhasil
        $conn->commit();

        // Tampilkan popup dengan JavaScript
        echo "<script>
            alert('Data berhasil dihapus!');
            window.location.href = 'data_pemilih.php'; // Redirect setelah popup
        </script>";
        exit();
    } catch (Exception $e) {
        // Rollback transaksi jika ada error
        $conn->rollback();
        echo "<script>alert('Gagal menghapus data: " . $e->getMessage() . "');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemilih</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../CSS/data_pemilih.css">

    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- CDN JAVASCRIPT BOOSTRAP  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

    <!-- CDN JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- datables -->
     <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css">
     <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
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
            <li><a href="../ADMIN/data_pemilih.php"><i class="fa-solid fa-pen-to-square"></i>Data Pemilih</a></li>
            <li><a href="../ADMIN/data_pencalon.php"><i class="fa-solid fa-web-awesome"></i>Data Pencalon</a></li>
            <li><a href="../ADMIN/hasil_pemilihan.php"><i class="fa-solid fa-hourglass-start"></i>Hasil Pemilu</a></li>
            <li><a href="../USER/login.php"><i class="fa-solid fa-right-to-bracket"></i>Keluar</a></li>
        </ul>
    </div>
    <!-- Sidebar End -->
     

    <!-- Main Content -->
    <div class="container-sm" style="margin-left: 200px; padding: 20px; width: calc(100% - 200px); position:absolute; top: 150px;">
    <div class="row">
      <h2>Data Pemilihan</h2>
        <div class="card">
        <div class="card-header d-flex justify-content-between">
          <a href="data_pemilih.php?id=<?php echo $d['transaksi_id']; ?>" target="_blank" class="btn btn-warning btn-sm">Cetak</a>
          <input type="text" id="searchInput" class="form-control w-25" placeholder="Search" style="position:absolute; left:735px; top:5px;" >
        </div>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-success">
            <tr>
              <th>Nik</th>
              <th>Nama</th> 
              <th>Tanggal Lahir</th>
              <th>Jenis Kelamin</th>
              <th>No Telepon</th>
              <th>Alamat</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="tableBody">
            <?php
            // Cek apakah hasil query tidak kosong
            if ($result->num_rows > 0) {
                // Loop melalui hasil query
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['nik']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tanggal_lahir']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['no_telepon']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                    echo "<td><a href='data_pemilih.php?hapus_nik=" . urlencode($row['nik']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data.</td></tr>";
            }
            ?>
          </tbody>
        </table>

        <!-- Pagination -->
        <nav>
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
          </ul>
        </nav>

        <script>
        // Script untuk fitur pencarian
        document.getElementById('searchInput').addEventListener('keyup', function () {
          const filter = this.value.toLowerCase();
          const rows = document.querySelectorAll('#tableBody tr');

          rows.forEach(row => {
            const nama = row.cells[1].textContent.toLowerCase(); // Mengambil data dari kolom Nama
            if (nama.includes(filter)) {
              row.style.display = ''; // Tampilkan baris
            } else {
              row.style.display = 'none'; // Sembunyikan baris
            }
          });

          // Reset pagination jika diperlukan
          const pagination = document.querySelector('.pagination');
          if (filter !== '') {
            pagination.style.display = 'none'; // Sembunyikan pagination saat pencarian aktif
          } else {
            pagination.style.display = ''; // Tampilkan kembali pagination
          }
        });
        </script>
      </div>
    </div>
  </div>
</div>
    <!-- Main Content End -->
   
</body>
</html>
