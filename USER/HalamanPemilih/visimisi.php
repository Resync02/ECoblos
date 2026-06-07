<?php
session_start();
include "../../SERVICE/koneksi.php"; // Pastikan path benar

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan ID paslon dari parameter URL
$paslon_id = isset($_GET['no_urut']) ? intval($_GET['no_urut']) : 1;

// Query untuk mendapatkan data kandidat berdasarkan ID
$sql = "SELECT nama, visi_misi FROM kandidat WHERE no_urut = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $paslon_id);
$stmt->execute();
$result = $stmt->get_result();

// Periksa apakah data ditemukan
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $visi = $data['visi_misi'];
    $misi = explode("\n", $visi); // Pecah misi jika dipisahkan oleh baris baru
} else {
    die("Data tidak ditemukan untuk ID $paslon_id");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi dan Misi <?= htmlspecialchars($data['nama']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        body {
            background-image: url('images/bg1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .container {
            flex: 1; /* Membuat area konten utama fleksibel */
        }
    </style>
</head>
<body class="bg-gray-100 bg-opacity-50">
    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Main Content -->
    <div class="container mx-auto mt-8 bg-white bg-opacity-80 p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center mb-4">Visi dan Misi <?= htmlspecialchars($data['nama']) ?></h1>
        <p class="text-xl font-semibold mb-4"><?= htmlspecialchars($visi) ?></p>
        <ul class="list-disc ml-8">
            <?php foreach ($misi as $m): ?>
                <li class="mb-2"><?= htmlspecialchars($m) ?></li>
            <?php endforeach; ?>
        </ul>
        <div class="mt-8 text-center">
            <a href="index.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Kembali</a>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>
