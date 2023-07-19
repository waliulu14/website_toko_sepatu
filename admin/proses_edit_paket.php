<?php
include '../include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $namaPaket = $_POST['nama_paket'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Check if a new photo is uploaded
    if ($_FILES['foto']['name']) {
        $foto = $_FILES['foto']['name'];
        $fotoPath = 'asset/img/paket/' . $foto;

        // Move the uploaded photo to the destination directory
        move_uploaded_file($_FILES['foto']['tmp_name'], $fotoPath);

        // Update the database with the new photo
        $queryUpdate = "UPDATE paket SET nama_paket = '$namaPaket', deskripsi = '$deskripsi', harga = '$harga', foto = '$foto' WHERE id = '$id'";
    } else {
        // No new photo uploaded, update other fields excluding the photo
        $queryUpdate = "UPDATE paket SET nama_paket = '$namaPaket', deskripsi = '$deskripsi', harga = '$harga' WHERE id = '$id'";
    }

    // Perform the database update
    $resultUpdate = mysqli_query($conn, $queryUpdate);

    if ($resultUpdate) {
        // Redirect to the paket.php page after successful update
        header("Location: paket.php");
        exit;
    } else {
        echo "Gagal melakukan pembaruan data.";
        exit;
    }
} else {
    echo "Metode tidak diizinkan.";
    exit;
}
?>