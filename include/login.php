<?php
// Mengambil konfigurasi koneksi database
require_once 'config.php';

// Fungsi untuk membersihkan input pengguna
function cleanInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Ambil data yang di-submit oleh form login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = cleanInput($_POST['username']);
    $password = cleanInput($_POST['password']);

    // Query untuk memeriksa username di tabel login
    $query = "SELECT level, id, username, password FROM login WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Cek hasil query
    if (mysqli_num_rows($result) == 1) {
        // Ambil data pengguna dari hasil query
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        // Verifikasi password
        if (password_verify($password, $storedPassword)) {
            // Ambil level pengguna, ID, dan username dari hasil query
            $level = $row['level'];
            $user_id = $row['id'];
            $username = $row['username'];

            // Mulai sesi dan simpan level pengguna, ID, dan username di dalam sesi
            session_start();
            $_SESSION['level'] = $level;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;

            // Arahkan ke halaman sesuai dengan level pengguna
            if ($level == 'admin') { // Redirect to admin page
                header("Location: index.php");
                exit();
            } elseif ($level == 'pelanggan') { // Redirect to customer page
                header("Location: pelanggan/index.php");
                exit();
            } else {
                // Jika level tidak sesuai dengan admin atau pelanggan
                $error = "Level pengguna tidak valid!";
            }
        } else {
            $error = "Username atau password salah!";
        }
    } else {
        $error = "Username atau password salah!";
    }

    // Hapus hasil query dari memori
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
