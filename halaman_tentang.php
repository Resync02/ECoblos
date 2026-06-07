<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang | E-Coblos</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="./CSS/halaman_tentang.css">

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
                <a class="nav-link" href="index.php">Tampilan Utama</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"onclick="showWarning(event)">Halaman Pemilihan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"onclick="showWarning(event)">Panduan Pencoblosan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"onclick="showWarning(event)">Lihat Hasil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Tentang E-Coblos</a>
              </li>
            </ul>
        </div>
      </nav>
    <!------------------------ Navbar End ------------------------>
    


    <!------------------------ Tentang Page 1  ------------------------>
    <!--
    Heads up! 👋

    This component comes with some `rtl` classes. Please remove them if they are not needed in your project.
    -->
    
    <section class="overflow-hidden bg-gray-50 sm:grid sm:grid-cols-2 sm:items-center">
      <div class="p-8 md:p-12 lg:px-16 lg:py-24">
        <div class="mx-auto max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
          <h2 class="text-2xl font-bold text-gray-900 md:text-3xl">
          Tentang E-Coblos
          </h2>

          <p class="hidden text-gray-500 md:mt-4 md:block">
            E-Coblos merupakan sebuah Platform Online atau Website yang kami kembangkan dengan tujuan 
            agar masyarakat dapat melakukan pemilihan dan pemantauan hasil suara secara online. 
            Sehingga menjadikan pemungutan suara serta pemilihan yang bersifat Luas, Bebas, Jujur, dan Adil. 
            Dengan adanya Website E-Coblos ini kami dapat memberikan hasil voting yang transparan dan bersifat Real-Time.
          </p>

          <h2 class="text-2xl font-bold text-gray-900 md:text-3xl">
            Visi & Misi E-Coblos
          </h2>

          <p class="hidden text-gray-500 md:mt-4 md:block">
            "Mewujudkan Pemilihan dan Pemungutan suara yang bersih, transparan, dan inklusif 
            untuk memastikan hak setiap warga negara terpenuhi dalam memilih pemimpin yang berintegritas, 
            demi Indonesia yang berdaulat, adil, dan sejahtera."
          </p>

          <div class="mt-4 md:mt-8">
            <a
              href="#" onclick="showWarning(event)"
              class="inline-block rounded bg-emerald-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-emerald-700 focus:outline-none focus:ring focus:ring-yellow-400">
              Coblos Sekarang!
            </a>
          </div>
        </div>
      </div>

      <img
        alt=""
        src="./IMG/about.jpg"
        class="h-full w-full object-cover sm:h-[calc(100%_-_2rem)] sm:self-end sm:rounded-ss-[30px] md:h-[calc(100%_-_4rem)] md:rounded-ss-[60px]"
      />
    </section>
    <!------------------------ Tentang Page 1 End  ------------------------>


    <!------------------------ Tentang Page ------------------------>
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
          <header class="text-center">
            <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Terima Kasih Kepada</h2>
      
            <p class="mx-auto mt-4 max-w-md text-gray-500">
              "Mereka merupakan orang - orang yang berjasa dan berdedikasi tinggi dalam pengembangan Website E-Coblos"
            </p>
          </header>
      
          <ul class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <li>
              <a href="#" class="group block overflow-hidden">
                <img
                  src="./IMG/fadil.jpg"
                  alt=""
                  class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
                />
      
                <div class="relative bg-white pt-3">
                  <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                    Fadhil Muhammad
                  </h3>
      
                  <p class="mt-2">
                    <span class="sr-only"> Regular Price </span>
      
                    <span class="tracking-wider text-gray-900"> Idaman Dede Gemes </span>
                  </p>
                </div>
              </a>
            </li>

            <li>
                <a href="#" class="group block overflow-hidden">
                  <img
                    src="./IMG/iqbal.jpg"
                    alt=""
                    class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
                  />
        
                  <div class="relative bg-white pt-3">
                    <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                      Iqbal Hafizh
                    </h3>
        
                    <p class="mt-2">
                      <span class="sr-only"> Regular Price </span>
        
                      <span class="tracking-wider text-gray-900">Mandor Budak Arab </span>
                    </p>
                  </div>
                </a>
              </li>
      
            <li>
              <a href="#" class="group block overflow-hidden">
                <img
                  src="./IMG/ucok.jpg"
                  alt=""
                  class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
                />
      
                <div class="relative bg-white pt-3">
                  <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                    Farouk Ardhi Wijaya
                  </h3>
      
                  <p class="mt-2">
                    <span class="sr-only"> Regular Price </span>
      
                    <span class="tracking-wider text-gray-900"> "Arabian Boy's" </span>
                  </p>
                </div>
              </a>
            </li>
      
            <li>
              <a href="#" class="group block overflow-hidden">
                <img
                  src="./IMG/ghazi.jpg"
                  alt=""
                  class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
                />
      
                <div class="relative bg-white pt-3">
                  <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                    Ghazi
                  </h3>
      
                  <p class="mt-2">
                    <span class="sr-only"> Regular Price </span>
      
                    <span class="tracking-wider text-gray-900">"Apa aja yang penting menghasilkan"</span>
                  </p>
                </div>
              </a>
            </li>
      
            <li>
              <a href="#" class="group block overflow-hidden">
                <img
                  src="./IMG/zeki.jpg"
                  alt=""
                  class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
                />
      
                <div class="relative bg-white pt-3">
                  <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                    Zacky
                  </h3>
      
                  <p class="mt-2">
                    <span class="sr-only"> Regular Price </span>
      
                    <span class="tracking-wider text-gray-900">Hidup Seperti Larry </span>
                  </p>
                </div>
              </a>
            </li>

            <li>
              <a href="#" class="group block overflow-hidden">
                <img
                  src="./IMG/rafli.jpg"
                  alt=""
                  class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]"
                />
      
                <div class="relative bg-white pt-3">
                  <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                    Muhammad Rafli
                  </h3>
      
                  <p class="mt-2">
                    <span class="sr-only"> Regular Price </span>
      
                    <span class="tracking-wider text-gray-900">Yang penting idup </span>
                  </p>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </section>
    <!------------------------ Tentang Page End ------------------------>

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