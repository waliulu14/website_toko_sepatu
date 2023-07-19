<?php
session_start();
include '../include/config.php';

// Mengambil ID pelanggan dari sesi
if (isset($_SESSION['user_id'])) {
    $id_pelanggan = $_SESSION['user_id'];
} else {
    echo "ID pelanggan tidak valid.";
    exit();
}

// Query untuk mengambil data pesanan berdasarkan ID pelanggan dengan join ke tabel jenis_sepatu dan paket
$queryPesanan = "SELECT pesanan.id, jenis_sepatu.jenis_sepatu, paket.nama_paket, paket.harga, pesanan.jumlah, pesanan.tanggal_pesan
                 FROM pesanan
                 JOIN jenis_sepatu ON pesanan.id_jenis_sepatu = jenis_sepatu.id
                 JOIN paket ON pesanan.id_paket = paket.id
                 WHERE pesanan.id_pelanggan = '$id_pelanggan'";
$resultPesanan = mysqli_query($conn, $queryPesanan);
?>

<!-- Topbar -->
<!-- Container Fluid-->
<?php include 'navbar.php'; ?>
<div class="container-fluid" id="container-wrapper">
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                    <a href="pesan.php" class="btn btn-primary">Tambah Pesanan</a> <!-- Tombol Tambah Pesanan -->
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Pesanan</th>
                                <th>Jenis Sepatu</th>
                                <th>Paket</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Tanggal Pesan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rowPesanan = mysqli_fetch_assoc($resultPesanan)) {
                                $harga = $rowPesanan['harga'];
                                $jumlah = $rowPesanan['jumlah'];
                                $totalHarga = $harga * $jumlah;
                                $formattedHarga = "IDR " . number_format($harga, 0, ',', '.');
                                $formattedTotalHarga = "IDR " . number_format($totalHarga, 0, ',', '.');

                                echo "<tr>";
                                echo "<td>" . $rowPesanan['id'] . "</td>";
                                echo "<td>" . $rowPesanan['jenis_sepatu'] . "</td>";
                                echo "<td>" . $rowPesanan['nama_paket'] . "</td>";
                                echo "<td>" . $formattedHarga . "</td>";
                                echo "<td>" . $rowPesanan['jumlah'] . "</td>";
                                echo "<td>" . $formattedTotalHarga . "</td>";
                                echo "<td>" . $rowPesanan['tanggal_pesan'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
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

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f8f9fc;
        font-weight: bold;
        text-align: left;
    }

    table tbody tr:hover {
        background-color: #f2f2f2;
    }
    .btn-primary {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 14px;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #0069d9;
}

</style>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

</div>


