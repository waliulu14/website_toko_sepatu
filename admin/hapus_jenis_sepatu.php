<?php
include '../include/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data jenis sepatu berdasarkan ID
    $query = "DELETE FROM jenis_sepatu WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Data jenis sepatu berhasil dihapus
        header('Location: jenis_sepatu.php');
        exit();
    } else {
        // Terjadi kesalahan saat menghapus data jenis sepatu
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Jika tidak ada parameter ID, redirect ke halaman jenis_sepatu.php
    header('Location: jenis_sepatu.php');
    exit();
}
?>
