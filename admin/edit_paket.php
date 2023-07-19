<?php
include 'include/navbar.php';
include '../include/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch paket data from the database based on the ID
    $queryPaket = "SELECT * FROM paket WHERE id = '$id'";
    $resultPaket = mysqli_query($conn, $queryPaket);
    $rowPaket = mysqli_fetch_assoc($resultPaket);

    // Check if the paket data exists
    if (!$rowPaket) {
        echo "Data paket tidak ditemukan.";
        exit;
    }
} else {
    echo "ID paket tidak ditemukan.";
    exit;
}
?>

<!-- Form Edit Paket -->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Paket</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="paket.php">Data Paket</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Paket</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="proses_edit_paket.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $rowPaket['id']; ?>">
                        <div class="form-group">
                            <label for="nama_paket">Nama Paket</label>
                            <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="<?php echo $rowPaket['nama_paket']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo $rowPaket['deskripsi']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $rowPaket['harga']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                            <?php if (!empty($rowPaket['foto'])): ?>
                                <img src="asset/img/paket/<?php echo $rowPaket['foto']; ?>" alt="Current Photo" class="mt-2" style="max-width: 200px;">
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>







<!-- Footer -->
<?php include 'include/footer.php'; ?>
