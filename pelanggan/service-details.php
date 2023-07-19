<?php
$activePage = 'service';
include 'navbar.php';
?>
<?php
include '../include/config.php';

// Mendapatkan ID paket dari parameter URL
if (isset($_GET['paket_id'])) {
    $paketID = $_GET['paket_id'];

    // Query untuk mendapatkan informasi paket berdasarkan ID
    $paketQuery = "SELECT * FROM paket WHERE id = $paketID";
    $paketResult = mysqli_query($conn, $paketQuery);
    $paketRow = mysqli_fetch_assoc($paketResult);

    // Memeriksa apakah paket dengan ID yang diberikan ada
    if ($paketRow) {
        $imagePath = "../admin/asset/img/paket/" . $paketRow['foto']; // Tambahkan prefiks folder untuk mengambil gambar
        ?>
        <section class="servicedetails" class="section-p1">
            <div class="single-pro-image">
                <img src="<?php echo $imagePath; ?>" width="100%" id="MainImg">
                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="<?php echo $imagePath; ?>" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="image/d1.jpeg" width="100%" class="small-img">
                    </div>
                </div>
            </div>
            <div class="signle-pro-details">
                <h6>Service /
                    <?php echo $paketRow['nama_paket']; ?>
                </h6>
                <h1>
                    <?php echo $paketRow['nama_paket']; ?>
                </h1>
                <h4>Service Details</h4>
                <span>
                    <?php echo $paketRow['deskripsi']; ?>
                </span>
                <h4>Harga</h4>
                <span>
                    <?php echo $paketRow['harga']; ?>
                </span>
                <?php
                // Cek apakah pengguna sudah login atau belum
                if (isset($_SESSION['user_id'])) {
                    ?>
                    <button onclick="pesanService()">Pesan</button>
                    <?php
                } else {
                    ?>
                   <p id="loginText">Silakan <a href="pesan.php" id="loginLink"><i class="fas fa-sign-in-alt"></i></a> untuk memesan layanan ini.</p>


<script>
    // Fungsi untuk menampilkan teks saat ikon diklik
    function showText(textId, linkId, text) {
        var text = document.getElementById(textId);
        var link = document.getElementById(linkId);
        text.innerHTML = text.innerHTML + ' ' + text.textContent;
        link.innerHTML = '<i class="fas fa-sign-in-alt"></i> ' + text;
    }

    // Mengubah perilaku tautan saat diklik
    document.getElementById("loginLink").addEventListener("click", function () {
        showText("loginText", "loginLink", "Tombol login telah ditekan!");
        // Mengarahkan ke halaman login
        window.location.href = "login.php";
    });

    document.getElementById("registerLink").addEventListener("click", function () {
        showText("registerText", "registerLink", "Tombol register telah ditekan!");
        // Mengarahkan ke halaman register
        window.location.href = "register.php";
    });
</script>



                    <?php
                }
                ?>
            </div>
        </section>
        <?php
    } else {
        echo "Paket tidak ditemukan.";
    }
} else {
    echo "ID paket tidak diberikan.";
}

include('footer.php');
?>

<script src="script.js"></script>

</body>

</html>