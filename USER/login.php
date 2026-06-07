<?php
session_start();
include "../SERVICE/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = isset($_POST['nik']) ? trim($_POST['nik']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validasi input
    if (empty($nik) || empty($password)) {
        echo "<script>alert('Harap Isi Nik & Password');</script>";
        exit();
    }

    if (!ctype_digit($nik)) {
        echo "<script>alert('Nik harus berupa angka');</script>";
        exit();
    }

    // Cek koneksi database
    if ($conn->connect_error) {
        die("<p>Koneksi gagal: " . $conn->connect_error . "</p>");
    }

    // Query untuk mencocokkan data login
    $query = "SELECT login_user.password, login_user.role
              FROM login_user
              LEFT JOIN register ON login_user.nik = register.nik 
              WHERE login_user.nik = ?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        die("<p>Kesalahan pada query: " . $conn->error . "</p>");
    }

    $stmt->bind_param("s", $nik);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Validasi password
        if ($password === $row['password']) {
            $_SESSION['nik'] = $nik;
            $_SESSION['role'] = $row['role'];

            // Redirect sesuai role
            if ($row['role'] == 1) {
                // Admin
                header("Location: ../ADMIN/dashboard.php");
                exit();
            } elseif ($row['role'] == 0) {
                // User
                header("Location: tampilan_utama.php");
                exit();
            } else {
                echo "<p>Role tidak valid!</p>";
            }
        } else {
            echo "<script>alert('Password Salah');</script>";
        }
    } else {
        echo "<script>alert('Nik tidak ditemukan');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>E-Coblos | Login Form</title>
      <!-- Link CSS -->
      <link rel="stylesheet" href="../CSS/login.css">

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

    
      <!------------------------ Login Page ------------------------>
      <section class="relative flex flex-wrap lg:h-screen lg:items-center">
          <div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-24">
            <div class="mx-auto max-w-lg text-center">
              <h1 class="text-2xl font-bold sm:text-3xl">Selamat Datang di E-Coblos!</h1>
        
              <p class="mt-4 text-gray-500">
                Bergabunglah dan jadi bagian dari sebagian masyarakat yang berpartisipasi 
                dan berjuang untuk negara dengan suara anda! 
              </p>
            </div>
        
            <form action="login.php" method="POST" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
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
                <label for="password" class="sr-only">Password</label>
        
                <div class="relative">
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                    placeholder="Masukan password anda"
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
                  Tidak punya akun?
                  <a class="underline" href="../USER/register.php">Daftar sekarang!</a>
                </p>

                <p class="text-sm text-gray-500">
                  <a class="underline" href="../USER/lupa_password.php">Lupa Password</a>
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
              src="../IMG/login.jpg"
              class="absolute inset-0 h-full w-full object-cover"
            />
          </div>
        </section>
    <!------------------------ Login Page End  ------------------------>

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
