<?php
// Include connection file
include "../SERVICE/koneksi.php";

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['nik'])) {
    echo "<p>Silakan login terlebih dahulu.</p>";
    exit();
}

$nik = $_SESSION['nik'];  // Get the nik from session

// Query to fetch user data from register table
$query = "SELECT * FROM register WHERE nik = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $nik);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "<p>Data tidak ditemukan.</p>";
    exit();
}

// Process the form when submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telepon = $_POST['no_telepon'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $alamat = $_POST['alamat'];

    // Update query
    $update_query = "UPDATE register SET nama = ?, tanggal_lahir = ?, jenis_kelamin = ?, no_telepon = ?, provinsi = ?, kota = ?, kecamatan = ?, kelurahan = ?, alamat = ? WHERE nik = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("sssssssssi", $nama, $tanggal_lahir, $jenis_kelamin, $no_telepon, $provinsi, $kota, $kecamatan, $kelurahan, $alamat, $nik);

    if ($update_stmt->execute()) {
        echo "<p>Profil berhasil diperbarui.</p>";
        // Refresh the page to load updated data
        header("Refresh: 2");
    } else {
        echo "<p>Terjadi kesalahan saat memperbarui profil.</p>";
    }

    $update_stmt->close();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="../CSS/tampilan_utama.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>
        body {
            color: black;
        }
    </style>
</head>
<body>
    <!------------------------ Navbar ------------------------>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../IMG/header/logo.png" alt="" width="40" height="34" class="d-inline-block align-text-top">
                E-Coblos
            </a>
            <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link" href="tampilan_utama.php">Tampilan Utama</a></li>
                <li class="nav-item"><a class="nav-link" href="./HalamanPemilih/index.php">Halaman Pemilihan</a></li>
                <li class="nav-item"><a class="nav-link" href="./panduan_pencoblosan.php">Panduan Pencoblosan</a></li>
                <li class="nav-item"><a class="nav-link" href="./hasil.php">Lihat Hasil</a></li>
                <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang E-Coblos</a></li>
            </ul>

            <!-- Dropdown Profil -->
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> Profil
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li><h6 class="dropdown-header">Hi, <strong><?php echo htmlspecialchars($row['nama']); ?></strong></h6></li>
                    <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user-circle"></i> Lihat Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!------------------------ Navbar End ------------------------>

    <section class="container mt-5">
        <h2 class="text-center mb-4">Profil Pengguna</h2>
        <div class="card">
            <div class="card-header">
                <h3>Informasi Profil</h3>
            </div>
            <div class="card-body">
                <form action="profile.php" method="POST">
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="<?php echo htmlspecialchars($row['nik']); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo htmlspecialchars($row['tanggal_lahir']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="L" <?php echo ($row['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="P" <?php echo ($row['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="<?php echo htmlspecialchars($row['no_telepon']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?php echo htmlspecialchars($row['provinsi']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="kota" name="kota" value="<?php echo htmlspecialchars($row['kota']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo htmlspecialchars($row['kecamatan']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?php echo htmlspecialchars($row['kelurahan']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" required><?php echo htmlspecialchars($row['alamat']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p>Terima kasih karena Anda sudah mempercayai E-Coblos, Sebagai platform Online Voting Karya anak bangsa.</p>
        <div class="sosial">
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-linux"></i></a>
            <a href="#"><i class="fa-brands fa-cc-visa"></i></a>
        </div>
    </footer>
</body>
</html>
