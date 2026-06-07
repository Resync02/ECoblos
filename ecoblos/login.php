
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Coblos</title>
    
    <!-- Link CSS -->
     <link rel="stylesheet" href="CSS/login.css">
    <!-- CSS End -->

    <!-- LINK CDN TALLWIN-->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN END -->

</head>

<body>

    <!-- Login Form -->
    <div class="login-container">
        <h2>Selamat Datang di E-Coblos</h2>
        <form action="" method="POST">
            <input type="text" name="nik" placeholder="Masukkan NIK" required>
            <input type="password" name="password" placeholder="Masukkan Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="links">
            <a href="daftar.php">Daftar</a> | <a href="lupa_password.php">Lupa Password?</a>
        </div>
    </div>


</body>
</html>