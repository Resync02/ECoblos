<?php
// Koneksi ke database
include '../../SERVICE/koneksi.php';

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data kandidat
$query = "SELECT id, no_urut, nama, foto, visi_misi FROM kandidat";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pemilihan</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <?php include 'header.php'; ?>
    
        <!-- Dashboard -->
        <main class="container mx-auto mt-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="bg-white rounded-lg shadow-lg p-4">
                    <img src='../../ADMIN/uploads/<?php echo htmlspecialchars($row['foto']); ?>' alt="foto" class="rounded-lg w-full">
                        <h3 class="text-center font-bold text-xl mt-4"><?php echo htmlspecialchars($row['nama']); ?></h3>
                        <div class="mt-4 flex justify-center gap-4">
                            <form action="submit_vote.php" method="post">
                                <input type="hidden" name="paslon" value="<?php echo htmlspecialchars($row['no_urut']); ?>">
                                <button type="submit" class="bg-gradient-to-r from-green-500 to-green-700 text-white py-2 px-4 rounded-lg hover:opacity-90">Pilih</button>
                            </form>
                            <button onclick="location.href='visimisi.php?no_urut=<?php echo htmlspecialchars($row['no_urut']); ?>'" class="bg-gradient-to-r from-blue-500 to-blue-700 text-white py-2 px-4 rounded-lg hover:opacity-90">Visi-Misi</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>

    <br>
    <?php include 'footer.php'; ?>
</body>
</html>
