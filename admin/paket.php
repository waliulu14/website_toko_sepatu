<?php
include 'include/navbar.php';
include '../include/config.php';

$queryPaket = "SELECT * FROM paket";
$resultPaket = mysqli_query($conn, $queryPaket);
?>

<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Paket</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active" aria-current="page">Data Paket</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Paket</h6>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="#tambahPermintaanPaket">Add</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" id="dataTable">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Paket</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Foto</th>
                                <th>Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (mysqli_num_rows($resultPaket) > 0) {
                                $no = 1;
                                while ($rowPaket = mysqli_fetch_assoc($resultPaket)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowPaket['id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowPaket['nama_paket']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowPaket['deskripsi']; ?>
                                        </td>
                                        <td>
                                            <?php echo $rowPaket['harga']; ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($rowPaket['foto'])): ?>
                                                <img src="asset/img/paket/<?php echo $rowPaket['foto']; ?>" alt="Photo"
                                                    style="max-width: 100px;">
                                            <?php else: ?>
                                                No Photo
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="edit_paket.php?id=<?php echo $rowPaket['id']; ?>"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            <a href="hapus_paket.php?id=<?php echo $rowPaket['id']; ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda ingin menghapus ini?')">Hapus</a>

                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                            <tr>
                                <td colspan="7">Tidak ada data paket.</td>
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


    <!-- Modal Tambah Permintaan Paket -->
    <div class="modal fade" id="tambahPermintaanPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Permintaan Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="proses_tambah_permintaan_paket.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nama_paket">Nama Paket</label>
                            <input type="text" class="form-control" id="nama_paket" name="nama_paket" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                            <img id="previewFoto" src="#" alt="Preview Foto" style="max-width: 200px; display: none;">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#previewFoto').attr('src', e.target.result);
                    $('#previewFoto').show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#foto').change(function () {
            previewImage(this);
        });
    </script>