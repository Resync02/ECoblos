<?php
// Include file koneksi
include "../SERVICE/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Ambil data dari form
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telepon = $_POST['no_telepon'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $lupa_password = $_POST['lupa_password'];

    // Validasi input
    if (empty($nik) || empty($nama) || empty($tanggal_lahir) || empty($jenis_kelamin) || empty($no_telepon) || empty($provinsi) || empty($kota) || empty($kecamatan) || empty($kelurahan) || empty($alamat) || empty($password) || empty($lupa_password)) {
      echo "<script>alert('Semua field tidak boleh kosong!');</script>";  
      exit();        
    }

    if (!ctype_digit($nik)) {
        echo "<script>alert('Nik harus berupa angka!');</script>";
        exit();
    }

    // Cek duplikasi NIK
    $check_query = "SELECT nik FROM register WHERE nik = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("i", $nik);
    $check_stmt->execute();
    $check_stmt->store_result();
    if ($check_stmt->num_rows > 0) {
        echo "<script>alert('Nik anda sudah terdaftar!');</script>";
        exit();
    }

    // Masukkan data ke tabel register
    $query = "INSERT INTO register (nik, nama, tanggal_lahir, jenis_kelamin, no_telepon, provinsi, kota, kecamatan, kelurahan, alamat, password, lupa_password) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    echo "<script>alert('Berhasil terdaftar!');</script>";
    $stmt->bind_param("ssssssssssss", $nik, $nama, $tanggal_lahir, $jenis_kelamin, $no_telepon, $provinsi, $kota, $kecamatan, $kelurahan, $alamat, $password, $lupa_password);
    if ($stmt->execute()) {
        // Masukkan data ke tabel login_user
        $query_login = "INSERT INTO login_user (password, nik, role) VALUES (?, ?, 'user')";
        $stmt_login = $conn->prepare($query_login);
        $stmt_login->bind_param("si", $password, $nik);
        $stmt_login->execute();

        // Masukkan data ke tabel lupa_password
        $query_lupa = "INSERT INTO lupa_password (nik, lupa_password) VALUES (?, ?)";
    } else {
        echo "<p>Terjadi kesalahan: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $stmt_login->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>E-Coblos | Register Form</title>
      <!-- Link CSS -->
      <link rel="stylesheet" href="../CSS/register.css">

      <!-- Link Tailwind CSS -->
      <script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>


      <!-- CDN BOOTSTRAP -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

      <!-- CDN JAVASRIPT BOOTSTRAP -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

      <!-- CDN JS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <!-- Custom JS -->
      <script src="../custom.js"> </script>

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
                  <a class="nav-link" href="../index.php">Tampilan Utama</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="#" onclick="showWarning(event)">Halaman Pemilihan</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="#" onclick="showWarning(event)">Panduan Pencoblosan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showWarning(event)">Lihat Hasil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../halaman_tentang.php">Tentang E-Coblos</a>
                  </li>
              </ul>
          </div>
        </nav>
      <!------------------------ Navbar End  ------------------------>

      <!------------------------ Home  ------------------------>
      <section class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
          <div class="mx-auto max-w-xl text-center">
            <h1 class="text-3xl font-extrabold sm:text-5xl">
              Saatnya Indonesia Memilih
              <strong class="font-extrabold text-red-700 sm:block">Untuk Indonesia Maju </strong>
            </h1>
      
            <p class="mt-4 sm:text-xl/relaxed">
              Ayo suarakan suaramu, dan jadilah bagian dari pergelaran pemilihan terbesar, Untuk negara dan pemimpin yang lebih baik!
            </p>
          </div>
        </div>
      </section>
      <!------------------------ Home End  ------------------------>


      <!------------------------ Register Page ------------------------>
      <section class="bg-white">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
          <section class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6">
            <img
              alt=""
              src="../IMG/register.jpg"
              class="absolute inset-0 h-full w-full object-cover opacity-80"
            />

            <div class="hidden lg:relative lg:block lg:p-12">
              <a class="block text-white" href="#">
                <span class="sr-only">Home</span>
                <svg
                  class="h-8 sm:h-10"
                  viewBox="0 0 28 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M0.41 10.3847C1.14777 7.4194 2.85643 4.7861 5.2639 2.90424C7.6714 1.02234 10.6393 0 13.695 0C16.7507 0 19.7186 1.02234 22.1261 2.90424C24.5336 4.7861 26.2422 7.4194 26.98 10.3847H25.78C23.7557 10.3549 21.7729 10.9599 20.11 12.1147C20.014 12.1842 19.9138 12.2477 19.81 12.3047H19.67C19.5662 12.2477 19.466 12.1842 19.37 12.1147C17.6924 10.9866 15.7166 10.3841 13.695 10.3841C11.6734 10.3841 9.6976 10.9866 8.02 12.1147C7.924 12.1842 7.8238 12.2477 7.72 12.3047H7.58C7.4762 12.2477 7.376 12.1842 7.28 12.1147C5.6171 10.9599 3.6343 10.3549 1.61 10.3847H0.41ZM23.62 16.6547C24.236 16.175 24.9995 15.924 25.78 15.9447H27.39V12.7347H25.78C24.4052 12.7181 23.0619 13.146 21.95 13.9547C21.3243 14.416 20.5674 14.6649 19.79 14.6649C19.0126 14.6649 18.2557 14.416 17.63 13.9547C16.4899 13.1611 15.1341 12.7356 13.745 12.7356C12.3559 12.7356 11.0001 13.1611 9.86 13.9547C9.2343 14.416 8.4774 14.6649 7.7 14.6649C6.9226 14.6649 6.1657 14.416 5.54 13.9547C4.4144 13.1356 3.0518 12.7072 1.66 12.7347H0V15.9447H1.61C2.39051 15.924 3.154 16.175 3.77 16.6547C4.908 17.4489 6.2623 17.8747 7.65 17.8747C9.0377 17.8747 10.392 17.4489 11.53 16.6547C12.1468 16.1765 12.9097 15.9257 13.69 15.9447C14.4708 15.9223 15.2348 16.1735 15.85 16.6547C16.9901 17.4484 18.3459 17.8738 19.735 17.8738C21.1241 17.8738 22.4799 17.4484 23.62 16.6547ZM23.62 22.3947C24.236 21.915 24.9995 21.664 25.78 21.6847H27.39V18.4747H25.78C24.4052 18.4581 23.0619 18.886 21.95 19.6947C21.3243 20.156 20.5674 20.4049 19.79 20.4049C19.0126 20.4049 18.2557 20.156 17.63 19.6947C16.4899 18.9011 15.1341 18.4757 13.745 18.4757C12.3559 18.4757 11.0001 18.9011 9.86 19.6947C9.2343 20.156 8.4774 20.4049 7.7 20.4049C6.9226 20.4049 6.1657 20.156 5.54 19.6947C4.4144 18.8757 3.0518 18.4472 1.66 18.4747H0V21.6847H1.61C2.39051 21.664 3.154 21.915 3.77 22.3947C4.908 23.1889 6.2623 23.6147 7.65 23.6147C9.0377 23.6147 10.392 23.1889 11.53 22.3947C12.1468 21.9165 12.9097 21.6657 13.69 21.6847C14.4708 21.6623 15.2348 21.9135 15.85 22.3947C16.9901 23.1884 18.3459 23.6138 19.735 23.6138C21.1241 23.6138 22.4799 23.1884 23.62 22.3947Z"
                    fill="currentColor"
                  />
                </svg>
              </a>

              <h2 class="mt-6 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                E-coblos Registerasi Form
              </h2>

              <p class="mt-4 leading-relaxed text-white/90">
                Daftar sekarang! Rayakan Kemenangan dan jadi bagian dari dari negara untuk masa depan yang lebih baik. 
              </p>
            </div>
          </section>

          <main
            class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6"
          >
            <div class="max-w-xl lg:max-w-3xl">
              <div class="relative -mt-16 block lg:hidden">
                <a
                  class="inline-flex size-16 items-center justify-center rounded-full bg-white text-blue-600 sm:size-20"
                  href="#"
                >
                  <span class="sr-only">Home</span>
                  <svg
                    class="h-8 sm:h-10"
                    viewBox="0 0 28 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M0.41 10.3847C1.14777 7.4194 2.85643 4.7861 5.2639 2.90424C7.6714 1.02234 10.6393 0 13.695 0C16.7507 0 19.7186 1.02234 22.1261 2.90424C24.5336 4.7861 26.2422 7.4194 26.98 10.3847H25.78C23.7557 10.3549 21.7729 10.9599 20.11 12.1147C20.014 12.1842 19.9138 12.2477 19.81 12.3047H19.67C19.5662 12.2477 19.466 12.1842 19.37 12.1147C17.6924 10.9866 15.7166 10.3841 13.695 10.3841C11.6734 10.3841 9.6976 10.9866 8.02 12.1147C7.924 12.1842 7.8238 12.2477 7.72 12.3047H7.58C7.4762 12.2477 7.376 12.1842 7.28 12.1147C5.6171 10.9599 3.6343 10.3549 1.61 10.3847H0.41ZM23.62 16.6547C24.236 16.175 24.9995 15.924 25.78 15.9447H27.39V12.7347H25.78C24.4052 12.7181 23.0619 13.146 21.95 13.9547C21.3243 14.416 20.5674 14.6649 19.79 14.6649C19.0126 14.6649 18.2557 14.416 17.63 13.9547C16.4899 13.1611 15.1341 12.7356 13.745 12.7356C12.3559 12.7356 11.0001 13.1611 9.86 13.9547C9.2343 14.416 8.4774 14.6649 7.7 14.6649C6.9226 14.6649 6.1657 14.416 5.54 13.9547C4.4144 13.1356 3.0518 12.7072 1.66 12.7347H0V15.9447H1.61C2.39051 15.924 3.154 16.175 3.77 16.6547C4.908 17.4489 6.2623 17.8747 7.65 17.8747C9.0377 17.8747 10.392 17.4489 11.53 16.6547C12.1468 16.1765 12.9097 15.9257 13.69 15.9447C14.4708 15.9223 15.2348 16.1735 15.85 16.6547C16.9901 17.4484 18.3459 17.8738 19.735 17.8738C21.1241 17.8738 22.4799 17.4484 23.62 16.6547ZM23.62 22.3947C24.236 21.915 24.9995 21.664 25.78 21.6847H27.39V18.4747H25.78C24.4052 18.4581 23.0619 18.886 21.95 19.6947C21.3243 20.156 20.5674 20.4049 19.79 20.4049C19.0126 20.4049 18.2557 20.156 17.63 19.6947C16.4899 18.9011 15.1341 18.4757 13.745 18.4757C12.3559 18.4757 11.0001 18.9011 9.86 19.6947C9.2343 20.156 8.4774 20.4049 7.7 20.4049C6.9226 20.4049 6.1657 20.156 5.54 19.6947C4.4144 18.8757 3.0518 18.4472 1.66 18.4747H0V21.6847H1.61C2.39051 21.664 3.154 21.915 3.77 22.3947C4.908 23.1889 6.2623 23.6147 7.65 23.6147C9.0377 23.6147 10.392 23.1889 11.53 22.3947C12.1468 21.9165 12.9097 21.6657 13.69 21.6847C14.4708 21.6623 15.2348 21.9135 15.85 22.3947C16.9901 23.1884 18.3459 23.6138 19.735 23.6138C21.1241 23.6138 22.4799 23.1884 23.62 22.3947Z"
                      fill="currentColor"
                    />
                  </svg>
                </a>

                <h1 class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
                  Welcome to Squid 🦑
                </h1>

                <p class="mt-4 leading-relaxed text-gray-500">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi nam dolorum aliquam,
                  quibusdam aperiam voluptatum.
                </p>
              </div>

              <form action="register.php" method="POST" class="mt-8 grid grid-cols-6 gap-6">
                <div class="col-span-6">
                  <label for="nik" class="block text-sm font-medium text-gray-700"> No Nik </label>

                  <input
                    type="text"
                    id="nik"
                    name="nik"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                    />
                </div>

                <div class="col-span-6">
                  <label for="nama" class="block text-sm font-medium text-gray-700"> Nama </label>

                  <input
                    type="text"
                    id="nama"
                    name="nama"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                    />
                </div>
                
                <div class="col-span-6 sm:col-span-3">
                  <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">
                    Tanggal Lahir
                  </label>

                  <input
                    type="date"
                    id="tanggal_lahir"
                    name="tanggal_lahir"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                    />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">
                    Jenis Kelamin
                  </label>

                  <input
                    type="text"
                    id="jenis_kelamin"
                    name="jenis_kelamin"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                    />

                   
                </div>                

                <div class="col-span-6">
                  <label for="no_telepon" class="block text-sm font-medium text-gray-700"> No Telepon </label>

                  <input
                    type="text"
                    id="no_telepon"
                    name="no_telepon"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                  />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="provinsi" class="block text-sm font-medium text-gray-700"> Provinsi </label>

                  <input
                    type="text"
                    id="provinsi"
                    name="provinsi"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                  />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="kota" class="block text-sm font-medium text-gray-700">
                    Kota / Kabupaten
                  </label>

                  <input
                    type="text"
                    id="kota"
                    name="kota"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                  />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="kecamatan" class="block text-sm font-medium text-gray-700"> Kecamatan </label>

                  <input
                    type="text"
                    id="kecamatan"
                    name="kecamatan"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                  />
                </div>

                <div class="col-span-6 sm:col-span-3">
                  <label for="kelurahan" class="block text-sm font-medium text-gray-700">
                    Kelurahan
                  </label>

                  <input
                    type="text"
                    id="kelurahan"
                    name="kelurahan"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                  />
                </div>

                <div class="col-span-6">
                  <label for="alamat" class="block text-sm font-medium text-gray-700"> Alamat </label>

                  <input
                    type="text"
                    id="alamat"
                    name="alamat"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                  />
                </div>

                <!-- space -->
                <div class="col-span-6">
                </div>
                <!-- space end -->


                <!-- Info -->
                <div class="col-span-6">
                  <label for="MarketingAccept" class="flex gap-4">
                    
                    <span class="text-sm text-gray-700">
                      Pertanyaan ini diperlukan pada saat anda lupa password.
                    </span>
                  </label>
                </div>
                <!-- Info End -->

                <div class="col-span-6 sm:col-span-3">
                  <label for="lupa_password" class="block text-sm font-medium text-gray-700"> Makanan Favorit Anda </label>

                  <input
                    type="text"
                    id="lupa_password"
                    name="lupa_password"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                  />
                </div>


                <!-- Info -->
                <div class="col-span-6">
                  <label for="MarketingAccept" class="flex gap-4">
                    
                    <span class="text-sm text-gray-700"><i class="fa-solid fa-triangle-exclamation"></i>
                      Pastikan untuk mencatat atau mengingat kata sandi Anda.
                    </span>
                  </label>
                </div>
                <!-- Info End -->


                <div class="col-span-6">
                  <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>

                  <input
                    type="password"
                    id="password"
                    name="password"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                  />
                </div>
                
                <!-- space -->
                <div class="col-span-6 sm:col-span-3">
                </div>
                <!-- space -->

                <div class="col-span-6">
                  <p class="text-sm text-gray-500">
                    By creating an account, you agree to our
                    <a href="#" class="text-gray-700 underline"> terms and conditions </a>
                    and
                    <a href="#" class="text-gray-700 underline">privacy policy</a>.
                  </p>
                </div>

                <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                  <button
                    class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500"
                    >
                    Daftar Sekarang
                  </button>

                  <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                    Login Sekarang ?
                    <a href="../USER/login.php" class="text-gray-700 underline">Masuk</a>.
                  </p>
                </div>
              </form>
            </div>
          </main>
        </div>
      </section>
      <!------------------------ Register Page End ------------------------>

      <!-- Modal Peringatan -->
    <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="warningModalLabel">Peringatan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Anda harus register terlebih dahulu untuk mengakses halaman pemilihan.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

  </body>
</html>
