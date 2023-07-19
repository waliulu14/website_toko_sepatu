<?php
include 'include/navbar.php';
include '../include/config.php';

$queryJenisSepatu = "SELECT * FROM jenis_sepatu";
$resultJenisSepatu = mysqli_query($conn, $queryJenisSepatu);
?>

<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jenis Sepatu</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active" aria-current="page">Data Jenis Sepatu</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Jenis Sepatu</h6>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="#tambahJenisSepatu">Add</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Jenis Sepatu</th>
                                <th>Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (mysqli_num_rows($resultJenisSepatu) > 0) {
                                $no = 1;
                                while ($rowJenisSepatu = mysqli_fetch_assoc($resultJenisSepatu)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowJenisSepatu['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowJenisSepatu['jenis_sepatu']; ?>
                                        </td>
                                        <td>
                                            <a href="edit_jenis_sepatu.php?id=<?php echo $rowJenisSepatu['id']; ?>"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="hapus_jenis_sepatu.php?id=<?php echo $rowJenisSepatu['id']; ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda ingin menghapus ini?')">Hapus</a>

                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                            <tr>
                                <td colspan="4">Tidak ada data jenis sepatu.</td>
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


    <!-- Modal Tambah Jenis Sepatu -->
    <div class="modal fade" id="tambahJenisSepatu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Sepatu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="proses_tambah_jenis_sepatu.php" method="POST">

                        <div class="form-group">
                            <label for="jenis_sepatu">Jenis Sepatu</label>
                            <input type="text" class="form-control" id="jenis_sepatu" name="jenis_sepatu" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
