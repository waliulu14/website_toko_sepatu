<?php
$activePage = '';
include 'include/navbar.php';
?>

<?php
include '../include/config.php';

// Mengambil jumlah data Jenis Sepatu
$queryJenisSepatu = "SELECT COUNT(*) AS jumlah FROM jenis_sepatu";
$resultJenisSepatu = mysqli_query($conn, $queryJenisSepatu);
$rowJenisSepatu = mysqli_fetch_assoc($resultJenisSepatu);
$jumlahJenisSepatu = $rowJenisSepatu['jumlah'];

// Mengambil jumlah data Pelanggan
$queryPelanggan = "SELECT COUNT(*) AS jumlah FROM pelanggan";
$resultPelanggan = mysqli_query($conn, $queryPelanggan);
$rowPelanggan = mysqli_fetch_assoc($resultPelanggan);
$jumlahPelanggan = $rowPelanggan['jumlah'];

// Mengambil jumlah data Pesanan
$queryPesanan = "SELECT COUNT(*) AS jumlah FROM pesanan";
$resultPesanan = mysqli_query($conn, $queryPesanan);
$rowPesanan = mysqli_fetch_assoc($resultPesanan);
$jumlahPesanan = $rowPesanan['jumlah'];

// Mengambil jumlah data Transaksi
$queryTransaksi = "SELECT COUNT(*) AS jumlah FROM transaksi";
$resultTransaksi = mysqli_query($conn, $queryTransaksi);
$rowTransaksi = mysqli_fetch_assoc($resultTransaksi);
$jumlahTransaksi = $rowTransaksi['jumlah'];

// Tutup koneksi ke database
mysqli_close($conn);
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Jumlah Jenis Sepatu -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Jenis Sepatu</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php echo $jumlahJenisSepatu; ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jumlah Data Pelanggan -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Data Pelanggan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php echo $jumlahPelanggan; ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-shopping-cart fa-2x text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jumlah Data Pesanan -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Data Pesanan</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                <?php echo $jumlahPesanan; ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-info"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jumlah Data Transaksi -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">Data Transaksi</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php echo $jumlahTransaksi; ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-warning"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Row-->

  <?php include 'include/footer.php' ?>
</div>
</body>

</html>
