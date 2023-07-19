<?php
include '../include/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil informasi foto sebelum dihapus
    $querySelect = "SELECT image_path FROM gallery WHERE id = $id";
    $resultSelect = mysqli_query($conn, $querySelect);
    $rowSelect = mysqli_fetch_assoc($resultSelect);

    // Hapus data galeri
    $queryDelete = "DELETE FROM gallery WHERE id = $id";
    $resultDelete = mysqli_query($conn, $queryDelete);

    if ($resultDelete) {
        // Hapus file foto dari server
        $imagePath = 'asset/img/gallery/' . $rowSelect['image_path'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Redirect ke halaman galeri
        header('Location: galery.php');
        exit();
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
