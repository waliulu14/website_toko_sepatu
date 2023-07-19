<?php
include '../include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $jenisSepatu = $_POST['jenis_sepatu'];

    // Update jenis sepatu data in the database
    $queryUpdateJenisSepatu = "UPDATE jenis_sepatu SET jenis_sepatu = '$jenisSepatu' WHERE id = '$id'";
    $resultUpdateJenisSepatu = mysqli_query($conn, $queryUpdateJenisSepatu);

    if ($resultUpdateJenisSepatu) {
        // Redirect to jenis_sepatu.php if the update is successful
        header('Location: jenis_sepatu.php');
        exit;
    } else {
        echo "Gagal mengupdate data jenis sepatu: " . mysqli_error($conn);
    }
} else {
    echo "Metode tidak diizinkan.";
}
