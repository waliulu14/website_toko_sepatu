<?php
include 'include/navbar.php';
include '../include/config.php';

// Memeriksa apakah form pesanan telah disubmit
if (isset($_POST['submit'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_jenis_sepatu = $_POST['id_jenis_sepatu'];
    $id_paket = $_POST['id_paket'];
    $jumlah = $_POST['jumlah'];
    $tanggal_pesan = date('Y-m-d'); // Menggunakan tanggal saat ini

    // Insert data ke tabel pesanan
    $insertPesananQuery = "INSERT INTO pesanan (id_pelanggan, id_jenis_sepatu, id_paket, jumlah, tanggal_pesan) VALUES ('$id_pelanggan', '$id_jenis_sepatu', '$id_paket', '$jumlah', '$tanggal_pesan')";
    $insertPesananResult = mysqli_query($conn, $insertPesananQuery);

    if ($insertPesananResult) {
        // Pesanan berhasil ditambahkan
        echo "<script>
            alert('Order placed successfully.');
            window.location.href = 'data_pesanan.php';
        </script>";
        exit(); // Menghentikan eksekusi script setelah mengalihkan halaman
    } else {
        // Jika gagal menyimpan data pesanan
        echo "Order placement failed. Error: " . mysqli_error($conn);
    }
}

// Query untuk mengambil data pelanggan
$queryPelanggan = "SELECT * FROM pelanggan";
$resultPelanggan = mysqli_query($conn, $queryPelanggan);

// Query untuk mengambil data jenis sepatu
$queryJenisSepatu = "SELECT * FROM jenis_sepatu";
$resultJenisSepatu = mysqli_query($conn, $queryJenisSepatu);

// Query untuk mengambil data paket
$queryPaket = "SELECT * FROM paket";
$resultPaket = mysqli_query($conn, $queryPaket);
?>

<!-- Topbar -->
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pesanan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item"><a href="data_pesanan.php">Data Pesanan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Pesanan</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Pesanan</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="tambah_pesanan.php">
                    <div class="form-group">
    <label for="id_pelanggan">ID Pelanggan:</label>
    <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
        <?php
        while ($rowPelanggan = mysqli_fetch_assoc($resultPelanggan)) {
            echo "<option value='" . $rowPelanggan['id'] . "'>" . $rowPelanggan['id'] . "</option>";
        }
        ?>
    </select>
</div>

                        <div class="form-group">
                            <label for="id_jenis_sepatu">Jenis Sepatu:</label>
                            <select name="id_jenis_sepatu" id="id_jenis_sepatu" class="form-control" required>
                                <?php
                                while ($rowJenisSepatu = mysqli_fetch_assoc($resultJenisSepatu)) {
                                    echo "<option value='" . $rowJenisSepatu['id'] . "'>" . $rowJenisSepatu['jenis_sepatu'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_paket">Paket:</label>
                            <select name="id_paket" id="id_paket" class="form-control" required>
                                <?php
                                while ($rowPaket = mysqli_fetch_assoc($resultPaket)) {
                                    echo "<option value='" . $rowPaket['id'] . "'>" . $rowPaket['nama_paket'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah:</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->

    <!-- Footer -->
    <?php include 'include/footer.php'; ?>

</div>
