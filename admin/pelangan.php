<?php
include 'include/navbar.php';
include '../include/config.php';

$queryPelanggan = "SELECT * FROM pelanggan";
$resultPelanggan = mysqli_query($conn, $queryPelanggan);
?>

<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pelanggan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active" aria-current="page">Data Pelanggan</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($resultPelanggan) > 0) {
                                $no = 1;
                                while ($rowPelanggan = mysqli_fetch_assoc($resultPelanggan)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $rowPelanggan['id']; ?></td>
                                        <td><?php echo $rowPelanggan['nama']; ?></td>
                                        <td><?php echo $rowPelanggan['no_telpon']; ?></td>
                                        <td><?php echo $rowPelanggan['email']; ?></td>
                                        <td><?php echo $rowPelanggan['alamat']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">Tidak ada data pelanggan.</td>
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
