<?php
include 'include/navbar.php';
include '../include/config.php';

if (isset($_GET['id'])) {
    $idPesanan = $_GET['id'];

    // Query untuk mendapatkan data pesanan berdasarkan ID
    $queryGetPesanan = "SELECT * FROM pesanan WHERE id = $idPesanan";
    $resultGetPesanan = mysqli_query($conn, $queryGetPesanan);
    $rowPesanan = mysqli_fetch_assoc($resultGetPesanan);

    // Jika pesanan dengan ID yang diberikan tidak ditemukan, redirect ke halaman data pesanan
    if (!$rowPesanan) {
        header("Location: data_pesanan.php");
        exit();
    }

    // Jika form disubmit, update status pesanan
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $status = $_POST['status'];

        // Query untuk update status pesanan
        $queryUpdatePesanan = "UPDATE pesanan SET status = '$status' WHERE id = $idPesanan";
        mysqli_query($conn, $queryUpdatePesanan);

        // Redirect ke halaman data pesanan setelah berhasil mengupdate status
        header("Location: data_pesanan.php");
        exit();
    }
} else {
    // Jika parameter ID tidak diberikan, redirect ke halaman data pesanan
    header("Location: data_pesanan.php");
    exit();
}
?>

<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pesanan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item"><a href="data_pesanan.php">Data Pesanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Pesanan</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Pesanan</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="status">Status Pesanan</label>
                            <select class="form-control" id="status" name="status">
                                <option value="proses" <?php echo ($rowPesanan['status'] === 'proses') ? 'selected' : ''; ?>>Proses</option>
                                <option value="packing" <?php echo ($rowPesanan['status'] === 'packing') ? 'selected' : ''; ?>>Packing</option>
                                <option value="selesai" <?php echo ($rowPesanan['status'] === 'selesai') ? 'selected' : ''; ?>>Selesai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="data_pesanan.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>

</div>
