<?php
include "../SERVICE/koneksi.php"; // Pastikan file koneksi benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = trim($_POST['nik']);
    $makanan = trim($_POST['makanan']); // Jawaban keamanan
    $password_baru = trim($_POST['password_baru']); // Password baru

    // Periksa apakah NIK dan makanan cocok di tabel register
    $query_register = "SELECT * FROM register WHERE nik = ? AND lupa_password = ?";
    $stmt_register = $conn->prepare($query_register);

    if (!$stmt_register) {
        die("Query preparation failed: " . $conn->error);
    }

    $stmt_register->bind_param("is", $nik, $makanan); // NIK = INT, makanan = STRING
    $stmt_register->execute();
    $result_register = $stmt_register->get_result();

    if ($result_register->num_rows > 0) {
        // Masukkan data ke tabel lupa_password
        $query_lupa = "INSERT INTO lupa_password (nik, makanan, password_baru) VALUES (?, ?, ?)";
        $stmt_lupa = $conn->prepare($query_lupa);

        if (!$stmt_lupa) {
            die("Query preparation failed: " . $conn->error);
        }

        $stmt_lupa->bind_param("iss", $nik, $makanan, $password_baru); // NIK = INT, makanan & password_baru = STRING

        if ($stmt_lupa->execute()) {
          // Perbarui password di tabel register
          $update_query_register = "UPDATE register SET password = ? WHERE nik = ?";
          $stmt_update_register = $conn->prepare($update_query_register);
          echo "<script>alert('Password Berhasil Diganti');</script>";
      
          if (!$stmt_update_register) {
              die("Query update preparation failed for register: " . $conn->error);
          }
      
          $stmt_update_register->bind_param("si", $password_baru, $nik);
      
          if (!$stmt_update_register->execute()) {
              echo "<p>Gagal memperbarui password di tabel register. Error: " . $stmt_update_register->error . "</p>";
          }
      
          $stmt_update_register->close();
      
          // Perbarui password di tabel login_user
          $update_query_login_user = "UPDATE login_user SET password = ? WHERE nik = ?";
          $stmt_update_login_user = $conn->prepare($update_query_login_user);
      
          if (!$stmt_update_login_user) {
              die("Query update preparation failed for login_user: " . $conn->error);
          }
      
          $stmt_update_login_user->bind_param("si", $password_baru, $nik);
      
          if (!$stmt_update_login_user->execute()) {
              echo "<p>Gagal memperbarui password di tabel login_user. Error: " . $stmt_update_login_user->error . "</p>";
          }
      
          $stmt_update_login_user->close();
      } else {
            echo "<p>Gagal memasukkan data ke tabel lupa_password. Error: " . $stmt_lupa->error . "</p>";
        }

        $stmt_lupa->close();
    } else {
        echo "<script>alert('NIK atau Jawaban Keamanan Salah');</script>";
    }

    $stmt_register->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Coblos | Lupa Password Form</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../CSS/lupa_password.css">

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


    <!------------------------ Lupa Password Page ------------------------>
    <section class="relative flex flex-wrap lg:h-screen lg:items-center">
        <div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-24">
          <div class="mx-auto max-w-lg text-center">
            <h1 class="text-2xl font-bold sm:text-3xl">Hmmm... Sepertinya anda lupa password :)</h1>
      
            <p class="mt-4 text-gray-500">
              Masukan nik anda! dan isi jawaban dari pertanyaan lupa password dengan 
              jawaban yang waktu itu anda isi di form registrasi. 
              Selamat mencoba :) 
            </p>
          </div>
      
          <form action="lupa_password.php" method="POST" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
            <div>
              <label for="nik" class="sr-only">Nik</label>
              <div class="relative">
                <input
                  type="text"
                  name="nik"
                  id="nik"
                  class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                  placeholder="Masukan nik anda"
                />
      
                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-4 text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                    />
                  </svg>
                </span>
              </div>
            </div>

            <div>
                <label for="makanan" class="sr-only"> </label>
                <div class="relative">
                  <input
                    type="text"
                    name="makanan"
                    id="makanan"
                    class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                    placeholder="Jawaban Pertanyaan Lupa Password"
                  />
        
                  <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="size-4 text-gray-400"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                      />
                    </svg>
                  </span>
                </div>
              </div>

            <div>
              <label for="password_baru" class="sr-only">Password</label>
      
              <div class="relative">
                <input
                  type="password"
                  name="password_baru"
                  id="password_baru"
                  class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                  placeholder="Konfirmasi Password Baru"
                />
      
                <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="size-4 text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                    />
                  </svg>
                </span>
              </div>
            </div>
      
            <div class="flex items-center justify-between">
              <p class="text-sm text-gray-500">
                Login Sekarang!!!
                <a class="underline" href="login.php">Login</a>
              </p>
            </div>

            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500">
                    <a class="underline" href="#"></a>
                </p>

                <button
                  type="submit"
                  class="inline-block rounded-lg bg-blue-500 px-5 py-3 text-sm font-medium text-white"
                >
                  Masuk
                </button>
              </div>
          </form>
        </div>
      
        <div class="relative h-64 w-full sm:h-96 lg:h-full lg:w-1/2">
          <img
            alt=""
            src="../IMG/lupa_password.jpg"
            class="absolute inset-0 h-full w-full object-cover"
          />
        </div>
      </section>
    <!------------------------ Lupa Password Page End ------------------------>
    <!-- Modal Peringatan -->
    <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="warningModalLabel">Peringatan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Anda harus login terlebih dahulu untuk mengakses halaman pemilihan.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

    
</body>
</html>