<?php
$activePage = 'gallery';
include 'navbar.php';
?>

<?php
include 'include/config.php';

$query = "SELECT * FROM paket";
$result = mysqli_query($conn, $query);
?>
<section id="banner" class="section-m1">
    <h2>My Galery</h2>
    <h4>Before - After Shoes Care</h4>
</section>



<section class="galery" class="section-p2">
  
    <div class="pro-container">
        <?php
        $galleryPath = 'admin/asset/img/gallery/';
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