<?php
// Memasukkan file koneksi
include "../SERVICE/koneksi.php";

// Query untuk mendapatkan data dari tabel
$query = "SELECT * FROM hasil";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}

// Variabel untuk menyimpan total suara dan data paslon
$total_suara = 0;
$data_paslon = [];

// Proses data hasil query
while ($row = mysqli_fetch_assoc($result)) {
    $total_suara += $row['paslon_1'] + $row['paslon_2'] + $row['paslon_3'];
    $data_paslon = [
        ['paslon' => 'Paslon 1', 'total_suara' => $row['paslon_1']],
        ['paslon' => 'Paslon 2', 'total_suara' => $row['paslon_2']],
        ['paslon' => 'Paslon 3', 'total_suara' => $row['paslon_3']],
    ];
}

// Tutup koneksi database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemilihan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-center mb-4">Hasil Pemilihan</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($data_paslon as $data): ?>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <!-- Foto Paslon -->
                    <img src="images/<?= strtolower(str_replace(' ', '_', $data['paslon'])) ?>.jpg" 
                         alt="Foto <?= $data['paslon'] ?>" 
                         class="w-full h-48 object-cover">

                    <!-- Informasi Paslon -->
                    <div class="p-4">
                        <h2 class="text-xl font-bold text-center mb-2"><?= $data['paslon'] ?></h2>
                        <p class="text-center text-gray-600">
                            <?= round(($data['total_suara'] / $total_suara) * 100, 2) ?>% suara
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
