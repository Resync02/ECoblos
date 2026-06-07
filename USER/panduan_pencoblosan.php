<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Coblos | Saatnya Anda Memilih</title>
        <!-- Link CSS -->
        <link rel="stylesheet" href="../CSS/panduan_pencoblosan.css">
    
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
    
    </head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <body>
        <!------------------------ Navbar  ------------------------>
        <nav class="navbar navbar-light" style="background-color: rgb(255, 255, 255);">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../IMG/header/logo.png" alt="" width="40" height="34" class="d-inline-block align-text-top">
                E-Coblos
            </a>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                    <a class="nav-link" href="tampilan_utama.php">Tampilan Utama</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./HalamanPemilih/index.php">Halaman Pemilihan</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Panduan Pencoblosan</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="./hasil.php">Lihat Hasil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentang.php">Tentang E-Coblos</a>
                    </li>
                </ul>
                <!-- Dropdown Profil -->
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user"></i> Profil
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li>
                    <h6 class="dropdown-header">Hi, <strong>User Name</strong></h6>
                </li>
                <li>
                    <a class="dropdown-item" href="./profile.php">
                        <i class="fa-solid fa-user-circle"></i> Lihat Profil
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="./logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
    </div>
</nav>
        <!------------------------ Navbar End  ------------------------>

    <!-- Header -->
    <header class="text-center py-10 bg-red-100">
        <h1 class="text-4xl font-extrabold text-red-700">Panduan Pencoblosan Online</h1>
        <p class="mt-4 text-gray-700">Ikuti langkah-langkah di bawah ini untuk menggunakan E-Coblos dengan mudah dan aman.</p>
    </header>

    <!-- Steps Section -->
    <section class="container mx-auto px-4 py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Step 1 -->
            <div class="bg-white shadow rounded p-6 text-center">
                <img src="../IMG/step1.png" alt="Daftar Akun" class="w-full h-40 object-cover rounded mb-4">
                <h2 class="text-xl font-bold">1. Daftar Akun</h2>
                <p class="mt-2 text-gray-600">Pertama-tama anda bisa klik tombol "Vote Now" pada halaman login lalu anda akan di arahkan ke halaman daftar untuk membuat akun. Anda wajib menggunakan Nik dan data pribadi yang valid untuk mendaftarkan diri anda.</p>
            </div>
            <!-- Step 2 -->
            <div class="bg-white shadow rounded p-6 text-center">
                <img src="../IMG/step2.png" alt="Login" class="w-full h-40 object-cover rounded mb-4">
                <h2 class="text-xl font-bold">2. Login ke Sistem</h2>
                <p class="mt-2 text-gray-600">Anda bisa masuk menggunakan email dan password yang telah terdaftar. Namun jika anda belum memiliki akun maka anda bisa klik "Daftar Sekarang" untuk membuat akun dan jika sudah selesai membuat akun maka anda akan diarahkan kembali ke Halaman Utama. Namun jika anda lupa pada password akun anda maka anda bisa menekan tombol "Lupa Password" untuk pemulihan akun anda.</p>
            </div>
            <!-- Step 3 -->
            <div class="bg-white shadow rounded p-6 text-center">
                <img src="../IMG/step3.png" alt="Pilih Kandidat" class="w-full h-40 object-cover rounded mb-4">
                <h2 class="text-xl font-bold">3. Pilih Kandidat</h2>
                <p class="mt-2 text-gray-600">Klik tombol "Halaman Pemilihan" pada Menu Utama lalu anda langsung diarahkan kedalam Halaman Pemilihan Kandidat. Namun jika anda belum login maka anda akan diarahkan kedalam Menu Login setelah menekan tombol "Halaman Login".</p>
            </div>
            <!-- Step 4 -->
            <div class="bg-white shadow rounded p-6 text-center">
                <img src="../IMG/panduan.png" alt="Konfirmasi Pilihan" class="w-full h-40 object-cover rounded mb-4">
                <h2 class="text-xl font-bold">4. Konfirmasi Pilihan</h2>
                <p class="mt-2 text-gray-600">Telusuri daftar kandidat yang tersedia dan pilih kandidat favorit Anda. Periksa kembali pilihan Anda, lalu konfirmasi untuk menyelesaikan proses pemilihan.</p>
            </div>
            <!-- Step 5 -->
            <div class="bg-white shadow rounded p-6 text-center">
                <img src="../IMG/step5.jpg" alt="Keamanan Data" class="w-full h-40 object-cover rounded mb-4">
                <h2 class="text-xl font-bold">5. Keamanan Data</h2>
                <p class="mt-2 text-gray-600">Data Anda aman dan terenkripsi untuk menjaga privasi Anda.</p>
            </div>
            <!-- Step 6 -->
            <div class="bg-white shadow rounded p-6 text-center">
                <img src="../IMG/home.jpg" alt="Cek Hasil" class="w-full h-40 object-cover rounded mb-4">
                <h2 class="text-xl font-bold">6. Cek Hasil</h2>
                <p class="mt-2 text-gray-600">Setelah semua pemilih selesai, Anda dapat melihat hasil pemilihan secara real-time.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 py-6">
        <div class="text-center">
            <p>&copy; 2025 E-Coblos. Semua Hak Dilindungi. Dibuat dengan <i class="fas fa-heart text-red-600"></i> oleh Pemuda Doyan Crypto.</p>
        </div>
    </footer>
</body>
</html>
