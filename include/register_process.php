<?php

// Include file config.php untuk koneksi ke database
require_once 'config.php';

// Memeriksa apakah form pendaftaran telah disubmit
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $no_telpon = $_POST['no_telpon'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];

    // Query untuk memeriksa apakah username sudah digunakan
    $checkUsernameQuery = "SELECT * FROM login WHERE username = '$username'";
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

    if (mysqli_num_rows($checkUsernameResult) > 0) {
        // Jika username sudah digunakan, tampilkan pesan error
        echo "Username already exists. Please choose a different username.";
    } else {
        // Jika username belum digunakan, lanjutkan proses pendaftaran
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert data ke tabel login
        $insertLoginQuery = "INSERT INTO login (username, password, level) VALUES ('$username', '$hashedPassword', 'pelanggan')";
        $insertLoginResult = mysqli_query($conn, $insertLoginQuery);

        if ($insertLoginResult) {
            // Jika data login berhasil diinsert, ambil ID login terakhir yang di-generate
            $id_login = mysqli_insert_id($conn);

            // Insert data ke tabel pelanggan
            $insertPelangganQuery = "INSERT INTO pelanggan (id_login, nama, no_telpon, email, alamat) VALUES ('$id_login', '$nama', '$no_telpon', '$email', '$alamat')";
            $insertPelangganResult = mysqli_query($conn, $insertPelangganQuery);

            if ($insertPelangganResult) {
                // Pendaftaran berhasil
                echo "<script>
                    alert('Registration successful. You can now login with your credentials.');
                    window.location.href = '../login.php';
                </script>";
            } else {
                // Jika gagal menyimpan data pelanggan
                echo "Registration failed. Please try again.";
            }
        } else {
            // Jika gagal menyimpan data login
            echo "Registration failed. Please try again.";
        }
    }
}

// Membuat file XML dari data pelanggan
$query = "SELECT * FROM pelanggan";
$result = mysqli_query($conn, $query);

$xml = new SimpleXMLElement('<pelanggan></pelanggan>');

while ($row = mysqli_fetch_assoc($result)) {
    $pelanggan = $xml->addChild('data_pelanggan');
    $pelanggan->addChild('nama', $row['nama']);
    $pelanggan->addChild('no_telpon', $row['no_telpon']);
    $pelanggan->addChild('email', $row['email']);
    $pelanggan->addChild('alamat', $row['alamat']);
}

$xml->asXML('data_pelanggan.xml');
?>