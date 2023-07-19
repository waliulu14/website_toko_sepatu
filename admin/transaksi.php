<?php
include 'include/navbar.php';
include '../include/config.php';

$queryTransaksi = "SELECT t.id, t.id_pesanan, t.metode_pembayaran, t.jumlah_pembayaran, p.id_pelanggan, p.tanggal_pesan
                    FROM transaksi t
                    INNER JOIN pesanan p ON t.id_pesanan = p.id";
$resultTransaksi = mysqli_query($conn, $queryTransaksi);

?>

<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>ID Pesanan</th>
                                <th>ID Pelanggan</th>
                                <th>Tanggal Pesan</th>
                                <th>Metode Pembayaran</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if ($resultTransaksi && mysqli_num_rows($resultTransaksi) > 0) {
                                $no = 1;
                                while ($rowTransaksi = mysqli_fetch_assoc($resultTransaksi)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowTransaksi['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowTransaksi['id_pesanan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowTransaksi['id_pelanggan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowTransaksi['tanggal_pesan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowTransaksi['metode_pembayaran']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowTransaksi['jumlah_pembayaran']; ?>
                                        </td>
                                        <td>
                                            <a href="edit_transaksi.php?id=<?php echo $rowTransaksi['id']; ?>"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="hapus_transaksi.php?id=<?php echo $rowTransaksi['id']; ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda ingin menghapus ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                            <tr>
                                <td colspan="8">Tidak ada data transaksi.</td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>

</div>
