<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemilihan</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../CSS/hasil.css">

    <!-- Link Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>


    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CDN JAVASRIPT BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

    <!-- CDN JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <!------------------------ Navbar  ------------------------>
    <nav class="navbar navbar-light" style="background-color: rgb(255, 255, 255);">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="../IMG/header/logo.png" alt="" width="40" height="34" class="d-inline-block align-text-top">
            E-Coblos
          </a>
            <ul class="nav justify-content-center" style="left:350px;">
              <li class="nav-item">
                <a class="nav-link" href="tampilan_utama.php">Tampilan Utama</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./HalamanPemilih/index.php">Halaman Pemilihan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="panduan_pencoblosan.php">Panduan Pencoblosan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Lihat Hasil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="tentang.php">Tentang E-Coblos</a>
              </li>
            </ul>
        </div>
      </nav>
    <!------------------------ Navbar End ------------------------>

    <!------------------------ Tentang Page ------------------------>
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
             <header class="text-center">
                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Selamat Datang di Hasil Pemilihan</h2>
             </header>
        </div>

        <!-- Main Content -->
    <div class="container-sm" style="margin-left: 100px; padding: 20px; width: calc(100% - 200px); position:absolute; top: 150px;">
      <div class="row">
        <h2>Hasil Pemilihan</h2>
        <div class="card" >
          <div class="card-header">
            <p>Waktu Perhitungan : <?php 
                // Mengatur zona waktu Indonesia (WIB)
                    date_default_timezone_set('Asia/Jakarta');
                    echo date("d F Y H:i:s");
            ?>
            </p>
        </div>
        
          <!-- Table -->
          <div class="chart">
          <canvas id="myChart" width="400" height="200"></canvas>
          </div>

        <script>
        // Ambil elemen canvas
        const ctx = document.getElementById('myChart');

        if (ctx) {
        console.log("Canvas ditemukan, inisialisasi grafik...");

        // Inisialisasi grafik dengan data kosong terlebih dahulu
        const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Paslon 1', 'Paslon 2', 'Paslon 3',], // Label tetap
            datasets: [{
                label: 'Hasil Suara',
                data: [],// Data awal kosong
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
        });

        // Fetch data dari file PHP (hasil_pemilihan_data.php)
        fetch('../ADMIN/hasil_aksi.php')
        .then(response => response.json()) // Konversi respons ke JSON
        .then(data => {
        console.log('Data JSON diterima:', data);

        // Update data grafik secara dinamis
        myChart.data.datasets[0].data = [data.paslon_1, data.paslon_2, data.paslon_3];
        myChart.update(); // Perbarui grafik
        })
        .catch(error => {
        console.error('Error saat mengambil data:', error);
        });

        } else {
        console.error("Canvas dengan ID 'myChart' tidak ditemukan!");
        }


        </script>


    </section>
    
    
</body>
</html>
