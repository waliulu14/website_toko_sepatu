<?php
include '../include/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $foto = $_FILES['foto'];

    $fileName = $foto['name'];
    $fileTmp = $foto['tmp_name'];
    $fileSize = $foto['size'];
    $fileError = $foto['error'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = ['jpg', 'jpeg', 'png'];

    if (in_array($fileExt, $allowedExtensions)) {
        if ($fileError === 0) {
            if ($fileSize < 5 * 1024 * 1024) { // Max file size: 5MB (5 * 1024 * 1024 bytes)
                $fileNewName = uniqid('', true) . '.' . $fileExt;
                $fileDestination = 'asset/img/gallery/' . $fileNewName;

                if (move_uploaded_file($fileTmp, $fileDestination)) {
                    // File berhasil diunggah, lakukan proses penyimpanan ke database
                    $queryInsert = "INSERT INTO gallery (title, description, image_path) VALUES ('$title', '$description', '$fileNewName')";
                    $resultInsert = mysqli_query($conn, $queryInsert);

                    if ($resultInsert) {
                        // Penambahan foto berhasil
                        header('Location: galery.php');
                        exit();
                    } else {
                        // Terjadi kesalahan saat menyimpan ke database
                        echo "Terjadi kesalahan saat menyimpan ke database: " . mysqli_error($conn);
                    }
                } else {
                    // Gagal memindahkan file yang diunggah
                    echo "Gagal memindahkan file yang diunggah.";
                }
            } else {
                // File terlalu besar
                echo "Ukuran file terlalu besar. Maksimal 5MB.";
            }
        } else {
            // Terjadi kesalahan saat mengunggah file
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    } else {
        // Ekstensi file tidak diperbolehkan
        echo "Ekstensi file tidak diperbolehkan. Hanya dapat mengunggah file dengan ekstensi JPG, JPEG, dan PNG.";
    }
}
?>
