<?php
session_start();
include "../../SERVICE/koneksi.php"; // Pastikan path benar

// Periksa koneksi
if (!$conn || $conn->connect_error) {
    die('Koneksi ke database gagal: ' . $conn->connect_error);
}

// Cek apakah user sudah login
$is_logged_in = isset($_SESSION['nik']);
$user_id = isset($_SESSION['nik']) ? $_SESSION['nik'] : null; // Ambil data user dari session

if (!$is_logged_in || !$user_id) {
    echo "<script>alert('Anda harus login terlebih dahulu!'); window.location.href = 'login.php';</script>";
    exit;
}

// Periksa apakah pengguna sudah memilih
$query_check = "SELECT * FROM pemilih WHERE nik = ?";
$stmt = $conn->prepare($query_check);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Jika sudah memilih, tampilkan pesan
    echo "<script>alert('Anda sudah memilih sebelumnya!'); window.location.href = 'index.php';</script>";
    exit;
}

if (isset($_POST['paslon'])) {
    $paslon = (int)$_POST['paslon'];

    // Validasi paslon
    if ($paslon >= 1 && $paslon <= 3) {
        // Tentukan kolom yang akan di-update
        $column = "paslon_$paslon";

        // Mulai transaksi
        $conn->begin_transaction();
        try {
            // Tambahkan suara ke kandidat
            // $query_update = "UPDATE hasil SET $column = $column + 1 WHERE id = 1";
            $query_update = "UPDATE hasil SET paslon_$paslon = paslon_$paslon + 1 WHERE id = ?";
            $stmt_update = $conn->prepare($query_update);
            $stmt_update->bind_param("i", $paslon);
            $stmt_update->execute();

            // $conn->query($query_update);

            // Simpan informasi bahwa pengguna telah memilih
            $query_insert = "INSERT INTO pemilih (nik) VALUES (?)";
            $stmt = $conn->prepare($query_insert);
            $stmt->bind_param("s", $user_id);
            $stmt->execute();

            // Commit transaksi
            $conn->commit();
            echo "<script>alert('Pilihan Anda berhasil disimpan!'); window.location.href = 'index.php';</script>";
        } catch (Exception $e) {
            // Rollback jika terjadi kesalahan
            $conn->rollback();
            echo "<script>alert('Gagal menyimpan pilihan: " . $e->getMessage() . "'); window.location.href = 'index.php';</script>";
        }
    } else {
        echo "<script>alert('Paslon tidak valid!'); window.location.href = 'index.php';</script>";
    }
} else {
    echo "<script>alert('Data tidak valid!'); window.location.href = 'index.php';</script>";
}

$conn->close(); // Tutup koneksi
?>
