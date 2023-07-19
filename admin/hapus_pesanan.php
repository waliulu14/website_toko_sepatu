<?php
include '../include/config.php';

// Cek apakah parameter id_pesanan telah diberikan
if (isset($_GET['id'])) {
    $id_pesanan = $_GET['id'];

    // Query untuk menghapus pesanan berdasarkan id_pesanan
    $queryHapus = "DELETE FROM pesanan WHERE id = '$id_pesanan'";
    $resultHapus = mysqli_query($conn, $queryHapus);

    if ($resultHapus) {
        // Pesanan berhasil dihapus
        echo "Pesanan berhasil dihapus.";
    } else {
        // Pesanan gagal dihapus
        echo "Gagal menghapus pesanan.";
    }
} else {
    // Parameter id_pesanan tidak diberikan
    echo "ID pesanan tidak valid.";
}

// Redirect kembali ke halaman data pesanan setelah menghapus pesanan
header("Location: pesanan.php");
exit();
?>
