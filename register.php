<?php
$activePage = 'login';
include 'navbar.php';
?>





<br>
<br>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .register-container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .register-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .register-container label {
            display: block;
            margin-bottom: 5px;
        }

        .register-container input[type="text"],
        .register-container input[type="password"],
        .register-container input[type="email"],
        .register-container textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .register-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .register-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .login-link {
            text-align: center;
            margin-top: 10px;
            font-size: 14px;
        }

        .login-link a {
            color: #999;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form method="post" action="include/register_process.php">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br><br>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required><br><br>
            <label for="no_telpon">No. Telepon:</label>
            <input type="text" name="no_telpon" id="no_telpon" required><br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br><br>
            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" required></textarea><br><br>
            <input type="submit" name="submit" value="Register">
        </form>
        <div class="login-link">
            <a href="login.php">Already have an account? Login here</a>
        </div>
    </div>
    
<script>
    function redirectToLogin() {
        window.location.href = "login.php";
    }
</script>
</body>
</html>
