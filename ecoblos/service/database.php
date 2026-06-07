<?php

// Konfigurasi koneksi database
$hostname       = "localhost";
$username       = "root";
$password       = "";
$database_name  = "e-coblos";

// Membuat koneksi
$conn = mysqli_connect ($hostname, $username, $password, $database_name);

// Periksa Koneksi
    if ($conn->connect_error) {
        die("Koneksi Gagal" . $conn->connect_error);
    }
    
?>
