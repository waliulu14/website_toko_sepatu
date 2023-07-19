<?php
include 'include/navbar.php';
include '../include/config.php';

$queryReview = "SELECT * FROM review_pelanggan";
$resultReview = mysqli_query($conn, $queryReview);
?>

<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Review Pelanggan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active" aria-current="page">Data Review Pelanggan</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Review Pelanggan</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Review</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($resultReview) > 0) {
                                $no = 1;
                                while ($rowReview = mysqli_fetch_assoc($resultReview)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $rowReview['nama']; ?></td>
                                        <td><?php echo $rowReview['review']; ?></td>
                                        <td>
                                            <?php if (!empty($rowReview['foto'])): ?>
                                                <img src="asset/img/review/<?php echo $rowReview['foto']; ?>" alt="Foto" width="100">
                                            <?php else: ?>
                                                Foto tidak tersedia
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="4">Tidak ada data review pelanggan.</td>
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
