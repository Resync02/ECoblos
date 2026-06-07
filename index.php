<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Coblos | Saatnya Anda Memilih</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="CSS/index.css">

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

    <!-- Custom JS -->
    <script src="custom.js"> </script>

  </head>
  <body>
      <!------------------------ Navbar  ------------------------>
      <nav class="navbar navbar-light" style="background-color: rgb(255, 255, 255);">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="./IMG/header/logo.png" alt="" width="40" height="34" class="d-inline-block align-text-top">
              E-Coblos
            </a>
              <ul class="nav justify-content-center" style="left:350px;">
                  <li class="nav-item">
                  <a class="nav-link" href="#">Tampilan Utama</a>
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
                    <a class="nav-link" href="halaman_tentang.php">Tentang E-Coblos</a>
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
      
            <div class="mt-8 flex flex-wrap justify-center gap-4">
              <a
                class="block w-full rounded bg-red-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-red-700 focus:outline-none focus:ring active:bg-red-500 sm:w-auto"
                href="./USER/login.php"
              >
                Vote Now
              </a>

              <a
                class="block w-full rounded px-12 py-3 text-sm font-medium text-red-600 shadow hover:text-red-700 focus:outline-none focus:ring active:text-red-500 sm:w-auto bg-light"
                href="halaman_tentang.php"
              >
                Learn More
              </a>
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
                  <a href="halaman_tentang.php">Tentang | E-Coblos.</a>
                </h2>
      
                <p class="mt-4 text-gray-700">
                  Merupakan sebuah website ataupun Platform Digital 
                  yang memudahkan rakyat indonesia dalam melakukan pemilihan.
                </p>
              </div>
            </div>
      
            <div class="md:col-span-3">
              <img
                src="./IMG/content1.jpg"
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
            src="./IMG/daftar_akun.jpg"
            class="h-56 w-full rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%] "
          />
        
          <div class="p-4">
            <a href="./USER/login.php">
              <h3 class="text-lg font-medium text-gray-900">Lakukan Pemilihan</h3>
            </a>
        
            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
            "Siap memilih masa depan Anda? Lakukan pemilihan dengan E-Coblos secara praktis, aman, dan transparan!
            </p>
          </div>

          <img
            alt=""
            src="./IMG/lihat_hasil.jpg"
            class="h-56 w-full rounded-xl object-cover shadow-xl transition group-hover:grayscale-[50%] "
          />
        
          <div class="p-4">
            <a href="./USER/register.php">
              <h3 class="text-lg font-medium text-gray-900">Daftar Akun</h3>
            </a>
        
            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
            "Selamat datang di E-Coblos! Mulai perjalanan anda menuju kemudahan memilih dengan membuat akun sekarang!"
            </p>
          </div>

          <img
            alt=""
            src="./IMG/lakukan_pemilihan.jpg"
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


      <!------------------------ Footer End  ------------------------>
      <!-- Footer -->
      <figure class="text-center">
          <blockquote class="blockquote">
          <p>"Mempermudah pemilihan, mendukung demokrasi. Semua hak dilindungi."</p>
          </blockquote>
          
      <figcaption class="blockquote-footer">
          <cite title="Source Title">Hubungi kami untuk informasi lebih lanjut atau bantuan</cite>
          </figcaption>
          <div class="sosial">
              <a href=""><i class="fa-brands fa-youtube"></i></a>
              <a href=""><i class="fa-brands fa-instagram"></i></a>
              <a href=""><i class="fa-brands fa-linux"></i></a>    
              <a href=""><i class="fa-brands fa-cc-visa"></i></a>
          </div>
      </figure>
      <!-- Footer End -->
      <!------------------------ Footer End  ------------------------>

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
              <a href="./USER/login.php" class="btn btn-primary">Login</a>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

  </body>
</html>
