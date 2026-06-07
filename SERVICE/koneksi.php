<?php
$host = "localhost"; // Sesuaikan dengan host database Anda
$user = "root"; // Sesuaikan dengan username database Anda
$pass = ""; // Masukkan password database Anda
$dbname = "e-coblos"; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
