<?php
include 'navbar.php';
include '../include/config.php';

// Fungsi untuk membersihkan input pengguna
function cleanInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Inisialisasi variabel untuk menampilkan pesan sukses atau error
$error = "";
$success = "";

// Menambahkan review pelanggan ke database
if (isset($_POST['submit'])) {
    // Validasi input
    $nama = cleanInput($_POST['nama']);
    $review = cleanInput($_POST['review']);

    // Upload foto
    $foto = $_FILES['foto']['name'];
    $foto_tmp = $_FILES['foto']['tmp_name'];
    $foto_path = '../admin/asset/img/review/' . $foto;
    move_uploaded_file($foto_tmp, $foto_path);

    // Query untuk menambahkan review pelanggan ke tabel review_pelanggan
    $query = "INSERT INTO review_pelanggan (nama, review, foto) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sss", $nama, $review, $foto);
    mysqli_stmt_execute($stmt);

    // Cek apakah review berhasil ditambahkan
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $success = "Review berhasil ditambahkan!";
    } else {
        $error = "Gagal menambahkan review.";
    }

    // Tutup statement
    mysqli_stmt_close($stmt);

    // Tutup koneksi ke database
    mysqli_close($conn);
}
?>

<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Review Pelanggan</h1>
      
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                    <!-- Formulir untuk menambahkan review -->
                    <form action="review.php" method="POST" enctype="multipart/form-data">
                        <!-- Field Nama -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <!-- Field Review -->
                        <div class="form-group">
                            <label for="review">Review</label>
                            <textarea class="form-control" id="review" name="review" rows="5" required></textarea>
                        </div>

                        <!-- Field Foto -->
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" required>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" name="submit">Submit Review</button>
                        </div>
                    </form>

                    <!-- Pesan Sukses atau Error -->
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success mt-3"><?php echo $success; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .container-fluid {
        padding: 20px;
    }

    .card {
        border: none;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f8f9fc;
        border-bottom: 1px solid #ddd;
    }

    .card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .btn-primary {
        padding: 10px 20px;
        background-color: #4CAF50;
        border: none;
        color: #fff;
        cursor: pointer;
        border-radius: 4px;
        font-size: 16px;
    }

    .alert {
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 4px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .text-right {
        text-align: right;
    }
</style>

<!-- Footer -->
<?php include 'footer.php'; ?>
