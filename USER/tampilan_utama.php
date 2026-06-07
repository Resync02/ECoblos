<?php
// Mulai sesi
session_start();

// Cek apakah user sudah login
$is_logged_in = isset($_SESSION['nik']);
$user = isset($_SESSION['user']) ? $_SESSION['user'] : null; // Ambil data user dari session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Coblos | Saatnya Anda Memilih</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="../CSS/tampilan_utama.css">

    <!-- Link Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CDN FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-white border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="../IMG/header/logo.png" alt="Logo" width="40" height="34" class="me-2">
                <span>E-Coblos</span>
            </a>
            <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link" href="tampilan_utama.php">Tampilan Utama</a></li>
                <li class="nav-item"><a class="nav-link" href="./HalamanPemilih/index.php">Halaman Pemilihan</a></li>
                <li class="nav-item"><a class="nav-link" href="panduan_pencoblosan.php">Panduan Pencoblosan</a></li>
                <li class="nav-item"><a class="nav-link" href="./hasil.php">Lihat Hasil</a></li>
                <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang E-Coblos</a></li>
            </ul>
            <div class="dropdown ms-auto">
                <button class="btn btn-light dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> Profil
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li>
                        <h6 class="dropdown-header">Hi, <strong><?php echo htmlspecialchars($user['nama'] ?? 'Guest'); ?></strong></h6>
                    </li>
                    <li><a class="dropdown-item" href="./profile.php"><i class="fa-solid fa-user-circle"></i> Lihat Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="./logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->

    <!------------------------ Home ------------------------>
    <section class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Saatnya Indonesia Memilih
                    <strong class="font-extrabold text-red-700 sm:block">Untuk Indonesia Maju</strong>
                </h1>
                <p class="mt-4 sm:text-xl/relaxed">
                    Ayo suarakan suaramu, dan jadilah bagian dari pergelaran pemilihan terbesar, untuk negara dan pemimpin yang lebih baik!
                </p>
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <?php if ($is_logged_in): ?>
                        <!-- Jika sudah login, arahkan ke halaman_pemilihan.php -->
                        <a class="block w-full rounded bg-red-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-red-700 sm:w-auto" href="./HalamanPemilih/index.php">Vote Now</a>
                    <?php else: ?>
                        <!-- Jika belum login, arahkan ke login.php -->
                        <a class="block w-full rounded bg-red-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-red-700 sm:w-auto" href="./login.php">Vote Now</a>
                    <?php endif; ?>
                    <a class="block w-full rounded px-12 py-3 text-sm font-medium text-red-600 shadow hover:text-red-700 sm:w-auto bg-light" href="./tentang.php">Learn More</a>
                </div>
            </div>
        </div>
    </section>
    <!------------------------ Home End  ------------------------>

    <!------------------------ Content 1  ------------------------>
    <section>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4 md:items-center md:gap-8">
        <div class="md:col-span-1">
            <div class="max-w-lg md:max-w-none">
            <h2 class="text-2xl font-semibold text-gray-900 sm:text-3xl">
                <a href="./tentang.php">Tentang | E-Coblos.</a>
            </h2>
    
            <p class="mt-4 text-gray-700">
                Merupakan sebuah website ataupun Platform Digital
                yang memudahkan rakyat indonesia dalam melakukan pemilihan.
            </p>
            </div>
        </div>
    
        <div class="md:col-span-3">
            <img
            src="../IMG/content1.jpg"
            class="rounded"
            alt=""/>
        </div>
        </div>
    </div>
    </section>
    <!------------------------ Content 1 End  ------------------------>


    <!------------------------ Content 2 ------------------------>
    <article class="group">
        <img
        alt=""
        src="../IMG/daftar_akun.jpg"
        class="h-56 w-full rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%] "
        />
        
        <div class="p-4">
        <a href="#">
            <h3 class="text-lg font-medium text-gray-900">Lakukan Pemilihan</h3>
        </a>
    
        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
        "Siap memilih masa depan Anda? Lakukan pemilihan dengan E-Coblos secara praktis, aman, dan transparan!
        </p>
        </div>

        <img
        alt=""
        src="../IMG/lihat_hasil.jpg"
        class="h-56 w-full rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%] "
        />
    
        <div class="p-4">
        <a href="#">
            <h3 class="text-lg font-medium text-gray-900">Daftar Akun</h3>
        </a>
    
        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
        "Selamat datang di E-Coblos! Mulai perjalanan anda menuju kemudahan memilih dengan membuat akun sekarang!"
        </p>
        </div>

        <img
        alt=""
        src="../IMG/lakukan_pemilihan.jpg"
        class="h-56 w-full rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%] "
        />
    
        <div class="p-4">
        <a href="#">
            <h3 class="text-lg font-medium text-gray-900">Lihat Hasil</h3>
        </a>
    
        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
        "Pantau hasil pemilihan secara real-time dengan E-Coblos! Transparan, cepat, dan akurat."
        </p>
        </div>
    </article>
    <!------------------------ Content 2 End  ------------------------>



    <!------------------------ Footer ------------------------>
    <footer class="text-center py-4">
        <blockquote class="blockquote">
            <p>Terima kasih karena Anda sudah mempercayai E-Coblos, sebagai platform online voting karya anak bangsa.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Website ini dibuat oleh <cite title="Source Title">Pemuda Doyan Crypto</cite>
        </figcaption>
        <div class="mt-2">
            <a href="#"><i class="fa-brands fa-youtube fa-lg"></i></a>
            <a href="#"><i class="fa-brands fa-instagram fa-lg"></i></a>
            <a href="#"><i class="fa-brands fa-linux fa-lg"></i></a>
        </div>
    </footer>
</body>
</html>
