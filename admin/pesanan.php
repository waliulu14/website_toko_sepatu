<?php
include 'include/navbar.php';
include '../include/config.php';

$queryPesanan = "SELECT pesanan.id, pesanan.id_pelanggan, pelanggan.nama, jenis_sepatu.jenis_sepatu, paket.nama_paket, pesanan.jumlah, pesanan.tanggal_pesan
                 FROM pesanan
                 JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id
                 JOIN jenis_sepatu ON pesanan.id_jenis_sepatu = jenis_sepatu.id
                 JOIN paket ON pesanan.id_paket = paket.id";

$resultPesanan = mysqli_query($conn, $queryPesanan);

?>

<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pesanan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active" aria-current="page">Data Pesanan</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>ID Pelanggan</th>   
                                <th>Nama Pelanggan</th>
                                <th>ID Jenis Sepatu</th>
                                <th>ID Paket</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pesan</th>
                                <th>Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if ($resultPesanan && mysqli_num_rows($resultPesanan) > 0) {
                                $no = 1;
                                while ($rowPesanan = mysqli_fetch_assoc($resultPesanan)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowPesanan['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowPesanan['id_pelanggan']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowPesanan['nama']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowPesanan['jenis_sepatu']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowPesanan['nama_paket']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowPesanan['jumlah']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowPesanan['tanggal_pesan']; ?>
                                        </td>
                                        <td>
                                            
                                            <a href="hapus_pesanan.php?id=<?php echo $rowPesanan['id']; ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda ingin menghapus ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                            <tr>
                                <td colspan="9">Tidak ada data pesanan.</td>
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
