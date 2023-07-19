<?php
include 'include/navbar.php';
include '../include/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch jenis sepatu data from the database based on the ID
    $queryJenisSepatu = "SELECT * FROM jenis_sepatu WHERE id = '$id'";
    $resultJenisSepatu = mysqli_query($conn, $queryJenisSepatu);
    $rowJenisSepatu = mysqli_fetch_assoc($resultJenisSepatu);

    // Check if the jenis sepatu data exists
    if (!$rowJenisSepatu) {
        echo "Data jenis sepatu tidak ditemukan.";
        exit;
    }
} else {
    echo "ID jenis sepatu tidak ditemukan.";
    exit;
}
?>

<!-- Form Edit Jenis Sepatu -->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Jenis Sepatu</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="jenis_sepatu.php">Data Jenis Sepatu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Jenis Sepatu</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="proses_edit_jenis_sepatu.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $rowJenisSepatu['id']; ?>">
                        <div class="form-group">
                            <label for="jenis_sepatu">Jenis Sepatu</label>
                            <input type="text" class="form-control" id="jenis_sepatu" name="jenis_sepatu" value="<?php echo $rowJenisSepatu['jenis_sepatu']; ?>" required>
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
