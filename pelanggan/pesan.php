<?php
session_start();
include '../include/config.php';

// Memeriksa apakah form pesanan telah disubmit
if (isset($_POST['submit'])) {
    // Mengambil ID pelanggan dari sesi
    if (isset($_SESSION['user_id'])) {
        $id_pelanggan = $_SESSION['user_id'];
    } else {
        echo "ID pelanggan tidak valid.";
        exit();
    }

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
            window.location.href = 'pesan.php';
        </script>";
        exit(); // Menghentikan eksekusi script setelah mengalihkan halaman
    } else {
        // Jika gagal menyimpan data pesanan
        echo "Order placement failed. Error: " . mysqli_error($conn);
    }
}

// Query untuk mengambil data jenis sepatu
$queryJenisSepatu = "SELECT * FROM jenis_sepatu";
$resultJenisSepatu = mysqli_query($conn, $queryJenisSepatu);

// Query untuk mengambil data paket
$queryPaket = "SELECT * FROM paket";
$resultPaket = mysqli_query($conn, $queryPaket);
?>

<!-- Topbar -->
<!-- Container Fluid-->
<?php include 'navbar.php'; ?>
<div class="container-fluid" id="container-wrapper">
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                
                <div class="card-body">
                    <form method="post" action="pesan.php">
                        <div class="form-group">
                            <label for="id_pelanggan">ID Pelanggan:</label>
                            <input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>" readonly>
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
<!-- Tambahkan bagian ini pada head tag -->
<style>
    .container-fluid {
        padding: 20px;
    }

    .card-header {
        background-color: #f8f9fc;
        border-bottom: 1px solid #ddd;
    }

    .card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    select,
    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    button[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 14px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #0069d9;
    }
</style>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</div>
