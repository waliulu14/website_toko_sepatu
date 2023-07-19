<?php
include '../include/config.php';

if (isset($_POST['jenis_sepatu'])) {
    $jenisSepatu = $_POST['jenis_sepatu'];

    $query = "INSERT INTO jenis_sepatu (jenis_sepatu) VALUES ('$jenisSepatu')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jenis sepatu berhasil ditambahkan
        header('Location: jenis_sepatu.php');
        exit();
    } else {
        // Terjadi kesalahan saat menambahkan jenis sepatu
        echo "Error: " . mysqli_error($conn);
    }
}
?>
