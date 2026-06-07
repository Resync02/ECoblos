<?php
session_start();
session_destroy();
header("Location: login.php");
exit;
?>



// Proses
    session_start()

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $nik      = $_POST['nik'];
        $password = $_POST['password'];
    
        // Validasi input kosong
        if (empty($nik) || empty($password)) {
            $error = "NIK atau Password tidak boleh kosong!";
        } else {
            // Ambil data pengguna dari tabel register
            $query = "SELECT * FROM login_user WHERE nik = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $nik);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
    
                // Verifikasi password
                if (password_verify($password, $user['password'])) {
                    // Simpan data login ke tabel login_user
                    $loginQuery = "INSERT INTO login_user (nik, password, created) VALUES (?, ?, NOW())";
                    $loginStmt = $conn->prepare($loginQuery);
                    $loginStmt->bind_param("ss", $nik, $user['password']);
                    $loginStmt->execute();
    
                    // Set session dan redirect
                    $_SESSION['user_id'] = $user['nik'];
                    $_SESSION['nama'] = $user['nama'];
                    
                    echo $user;
                    echo $user;
                    exit;
                } else {
                    $error = "Password salah!";
                }
            } else {
                $error = "NIK tidak ditemukan!";
            }
    
            $stmt->close();
        }
    }
    
    $conn->close();
    

