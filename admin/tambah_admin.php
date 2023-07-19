<?php
ob_start(); // Memulai output buffering
include 'include/navbar.php';
include '../include/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Data Admin
    $nama = $_POST['nama'];
    $no_telpon = $_POST['no_telpon'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Tambah data ke tabel login
    $queryLogin = "INSERT INTO login (username, password, level) VALUES ('$username', '$hashedPassword', 'admin')";
    mysqli_query($conn, $queryLogin);
    $id_login = mysqli_insert_id($conn);

    // Tambah data ke tabel admin
    $queryAdmin = "INSERT INTO admin (id_login, nama, no_telpon) VALUES ('$id_login', '$nama', '$no_telpon')";
    mysqli_query($conn, $queryAdmin);

    // Redirect ke halaman admin setelah berhasil menambahkan admin
    header('Location: index.php');
    exit;
}
ob_end_flush(); // Mengakhiri output buffering
?>

<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Admin</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="admin.php">Data Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Admin</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Admin</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telpon">No Telepon</label>
                            <input type="text" class="form-control" id="no_telpon" name="no_telpon" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>
</div>
