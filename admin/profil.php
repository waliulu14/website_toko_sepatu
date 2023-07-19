<?php include 'include/navbar.php'?>

<?php
// Mengambil konfigurasi koneksi database
require_once '../include/config.php';

// Fungsi untuk membersihkan input pengguna
function cleanInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Mendapatkan ID pengguna yang sedang masuk
$user_id = $_SESSION['user_id'];

// Mendapatkan data profil pengguna berdasarkan ID
$query = "SELECT admin.*, login.username FROM admin
          JOIN login ON admin.id_login = login.id
          WHERE admin.id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

// Tutup statement
mysqli_stmt_close($stmt);

// Mengupdate profil pengguna
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = cleanInput($_POST['nama']);
    $no_telpon = cleanInput($_POST['no_telpon']);

    // Update data pengguna
    $queryUpdate = "UPDATE admin SET nama = ?, no_telpon = ? WHERE id = ?";
    $stmtUpdate = mysqli_prepare($conn, $queryUpdate);
    mysqli_stmt_bind_param($stmtUpdate, "ssi", $nama, $no_telpon, $user_id);
    mysqli_stmt_execute($stmtUpdate);

    // Redirect ke halaman profil setelah berhasil mengupdate
    header('Location: profile.php');
    exit;
}
?>


<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profil</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="profile.php">Profil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telpon">No Telepon</label>
                            <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="<?php echo $row['no_telpon']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>
</div>

<?php
// Tutup koneksi ke database
mysqli_close($conn);
?>
