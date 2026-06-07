<?php
// Mulai sesi
session_start();

// Debugging - Periksa sesi sebelum dihapus
// echo "<pre>"; print_r($_SESSION); echo "</pre>";

// Menghapus semua sesi
session_unset();

// Menghancurkan sesi
session_destroy();

// Debugging - Periksa sesi setelah dihancurkan
// echo "Session destroyed.";

// Arahkan pengguna kembali ke halaman login
header("Location: ./login.php");
exit();
?>
