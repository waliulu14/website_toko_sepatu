<?php
$activePage = 'service';
include 'navbar.php';
?>

<?php
include '../include/config.php';

$query = "SELECT * FROM paket";
$result = mysqli_query($conn, $query);
?>

<section id="service-1" class="section-p1">
    <h2>Featured Services</h2>
</section>

<section id="feature" class="section-p2">
    <?php
    while ($paketRow = mysqli_fetch_assoc($result)) {
        $serviceLink = "service-details.php?paket_id=" . $paketRow['id'];
        $imagePath = "../admin/asset/img/paket/" . $paketRow['foto']; // Tambahkan prefiks folder untuk mengambil gambar
        ?>
        <div class="fe-box" onclick="window.location.href='<?php echo $serviceLink; ?>';">
            <img src="<?php echo $imagePath; ?>" alt="<?php echo $paketRow['nama_paket']; ?>">
            <h6><?php echo $paketRow['nama_paket']; ?></h6> 
        </div>
        <?php
    }
    ?>
</section>


<section id="banner" class="section-m1">
    <h4>PROMO CUCI SEPATU</h4>
    <h2>Cuci 5 Sepatu <span>Diskon 25% </span> - Untuk Semua Jenis Bahan Sepatu</h2>
</section>

<section class="galery" class="section-p2">
    <h2>My Galery</h2>
    <p>Before - After Shoes Care</p>
    <div class="pro-container">
        <?php
        $galleryPath = '../admin/asset/img/gallery/';
        $galleryQuery = "SELECT image_path FROM gallery";
        $galleryResult = mysqli_query($conn, $galleryQuery);
        while ($galleryRow = mysqli_fetch_assoc($galleryResult)) {
            $foto = $galleryPath . $galleryRow['image_path'];
            ?>
            <div class="pro">
                <img src="<?php echo $foto; ?>">
                <div class="des">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>

<?php 
    include('footer.php');
?>

<script src="script.js"></script>

</body>
</html>
