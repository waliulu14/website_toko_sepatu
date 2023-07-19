<?php
include '../include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaPaket = $_POST['nama_paket'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Proses upload foto jika ada
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $foto = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];

        // Tentukan direktori tujuan penyimpanan foto
        $foto_dir = 'asset/img/paket/';
        $foto_path = $foto_dir . $foto;

        // Pindahkan foto dari temporary folder ke direktori tujuan
        if (move_uploaded_file($foto_tmp, $foto_path)) {
            // Query untuk menambahkan data paket ke dalam database
            $query = "INSERT INTO paket (nama_paket, deskripsi, harga, foto) VALUES ('$namaPaket', '$deskripsi', '$harga', '$foto')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // Jika data berhasil ditambahkan, redirect ke halaman data paket
                header('Location: paket.php');
                exit();
            } else {
                // Jika terjadi error saat menambahkan data, tampilkan pesan error
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Jika gagal mengupload foto, tampilkan pesan error
            echo "Error uploading photo.";
        }
    } else {
        // Jika tidak ada foto yang diupload, atur nilai foto ke NULL atau kosong sesuai kebutuhan
        $foto = null;

        // Query untuk menambahkan data paket ke dalam database
        $query = "INSERT INTO paket (nama_paket, deskripsi, harga, foto) VALUES ('$namaPaket', '$deskripsi', '$harga', '$foto')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Jika data berhasil ditambahkan, redirect ke halaman data paket
            header('Location: paket.php');
            exit();
        } else {
            // Jika terjadi error saat menambahkan data, tampilkan pesan error
            echo "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
