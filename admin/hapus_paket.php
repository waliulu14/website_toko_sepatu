<?php
include '../include/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan informasi file gambar sebelum menghapus data
    $querySelect = "SELECT foto FROM paket WHERE id = '$id'";
    $resultSelect = mysqli_query($conn, $querySelect);

    if ($resultSelect && mysqli_num_rows($resultSelect) > 0) {
        $row = mysqli_fetch_assoc($resultSelect);
        $foto = $row['foto'];

        // Hapus file gambar dari direktori
        $foto_path = 'asset/img/paket/' . $foto;
        if (file_exists($foto_path)) {
            unlink($foto_path);
        }

        // Query untuk menghapus data paket berdasarkan ID
        $queryDelete = "DELETE FROM paket WHERE id = '$id'";
        $resultDelete = mysqli_query($conn, $queryDelete);

        if ($resultDelete) {
            // Jika data berhasil dihapus, redirect ke halaman data paket
            header("Location: paket.php");
            exit;
        } else {
            // Jika terjadi error saat menghapus data, tampilkan pesan error
            echo "Error: " . mysqli_error($conn);
            exit;
        }
    } else {
        echo "Data paket tidak ditemukan.";
        exit;
    }
} else {
    echo "ID paket tidak ditemukan.";
    exit;
}


?>
