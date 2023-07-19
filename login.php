<?php
$activePage = 'login';
include 'navbar.php';
?>

<?php
// Mengambil konfigurasi koneksi database
require_once 'include/config.php';

// Fungsi untuk membersihkan input pengguna
function cleanInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Inisialisasi variabel error
$error = '';

// Ambil data yang di-submit oleh form login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = cleanInput($_POST['username']);
    $password = cleanInput($_POST['password']);

    // Query untuk memeriksa username di tabel login
    $query = "SELECT level, id, password FROM login WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Cek hasil query
    if (mysqli_num_rows($result) == 1) {
        // Ambil data pengguna dari hasil query
        $row = mysqli_fetch_assoc($result);
        $level = $row['level'];
        $user_id = $row['id'];
        $hashedPassword = $row['password'];

        // Verifikasi password
        if (password_verify($password, $hashedPassword)) {
            // Mulai sesi dan simpan level pengguna di dalam sesi
            session_start();
            $_SESSION['level'] = $level;
            $_SESSION['user_id'] = $user_id;

            // Arahkan ke halaman sesuai dengan level pengguna
            if ($level == 'admin') { // Redirect to admin page
                header("Location: admin/index.php");
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

<br> <br> <br> <br>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
        }
        
        .form-group button:hover {
            background-color: #45a049;
        }
        
        .error {
            color: red;
            margin-top: 10px;
        }
        
        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        
        .register-link a {
            color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            <?php if (!empty($error)): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>
        </form>
        <div class="register-link">
            <a href="register.php">Belum punya akun? Daftar di sini</a>
        </div>
    </div>
</body>
</html>
