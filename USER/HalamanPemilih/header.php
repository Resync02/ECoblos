<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-size: cover;
            background-color: black;    
            color: #fff;
        }
        .header .left {
            display: flex;
            align-items: center;
        }
        .header .left img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }
        .header .center {
            flex-grow: 1;
            text-align: center;
        }
        .header .right {
            display: flex;
            align-items: center;
        }
        .header .right button {
            background: none;
            border: 2px solid #fff;
            border-radius: 5px;
            padding: 5px;
            color: #fff;
            cursor: pointer;
            margin-left: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .header .right button img {
            width: 25px;
            height: 25px;
            filter: invert(1); /* Makes the icons white */
        }
        .header .right button:hover {
            opacity: 0.8;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: black;
            color: #fff;
        }
.navbar ul {
    list-style: none;
    display: flex;
    justify-content: center;
    gap: 15px;
    margin: 0;
    flex-grow: 1;
}

.navbar ul li a {
    color: white;
    text-decoration: none;
    font-size: 1rem;
    padding: 5px 10px;
    transition: background-color 0.3s ease;
}

.navbar ul li a:hover {
    background-color: #87CEEB;
    border-radius: 10px;
}

.user-profile {
    position: relative;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.profile-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: white;
    box-shadow: 0 4px 8px rgba(255, 254, 254, 0.1);
    z-index: 10;
    border-radius: 5px;
    overflow: hidden;
}

.dropdown-content a {
    color: #333;
    text-decoration: none;
    display: block;
    padding: 10px;
    transition: background-color 0.3s ease;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.user-profile:hover .dropdown-content {
    display: block;
}

.profile-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    cursor: pointer;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 10;
    border-radius: 5px;
    overflow: hidden;
}

.dropdown-content a {
    color: #333;
    text-decoration: none;
    display: block;
    padding: 10px;
    transition: background-color 0.3s ease;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.user-profile:hover .dropdown-content {
    display: block;
}

@media (max-width: 768px) {
    .headline {
        font-size: 1.2rem;
    }

    .logo-img {
        max-width: 100px;
    }

    .navbar ul {
        flex-direction: column;
        gap: 10px;
    }

    .navbar ul li a {
        font-size: 0.9rem;
        padding: 5px;
    }
}

@media (max-width: 480px) {
    .headline {
        font-size: 1rem;
    }

    .navbar ul li a {
        font-size: 0.8rem;
    }

    .profile-img {
        width: 30px;
        height: 30px;
    }
}

img, a, button {
    -webkit-tap-highlight-color: transparent; /* Removes tap highlight for mobile */
}

body {
    -webkit-font-smoothing: antialiased; /* Smooth fonts on macOS and iOS */
    -moz-osx-font-smoothing: grayscale; /* Smooth fonts on macOS and iOS */
}
    </style>
</head>
<body>
    <div class="header">
        <div class="left">
            <img src="../HalamanPemilih/gambar/logo.png" alt="Logo">
            <span>E-Coblos</span>
        </div>
        <div class="center">
            <h1>Saatnya Indonesia Memilih</h1>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <li><a href="../tampilan_utama.php">Tampilan Utama</a></li>
            <li><a href="#">Halaman Pemilihan</a></li>
            <li><a href="../panduan_pencoblosan.php">Panduan Pencoblosan</a></li>
            <li><a href="../hasil.php">Lihat Hasil</a></li>
            <li><a href="../tentang.php">Tentang E-Coblos</a></li>
        </ul>
    </nav>

</body>
</html>
