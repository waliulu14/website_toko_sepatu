<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "20222_wp2_412018015";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
