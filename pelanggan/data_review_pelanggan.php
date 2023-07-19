<?php
$activePage = 'review';
include 'navbar.php';

// Mengambil konfigurasi koneksi database
require_once '../include/config.php';

// Query untuk mengambil data review pelanggan dari tabel review_pelanggan
$query = "SELECT * FROM review_pelanggan";
$result = mysqli_query($conn, $query);

// Tutup koneksi ke database
mysqli_close($conn);
?>

<section id="banner" class="section-m1">
    <h4>CONTACT</h4>
</section>

<section class="data-review-pelanggan">
    <div class="container">
        <h2>Data Customer Review</h2>
        <div class="text-center">
            <a href="review.php" class="button">Tambah Review</a>
        </div>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Review</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['review']; ?></td>
                            <td>
                                <?php if (!empty($row['foto'])): ?>
                                    <img src="../admin/asset/img/review/<?php echo $row['foto']; ?>" alt="Foto" width="100">
                                <?php else: ?>
                                    Foto tidak tersedia
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada data review pelanggan.</p>
        <?php endif; ?>
    </div>
</section>

<style>
    .data-review-pelanggan {
        background-color: #f4f4f4;
        padding: 40px 0;
    }
    .data-review-pelanggan .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        border: none;
        color: #fff;
        cursor: pointer;
        border-radius: 4px;
        font-size: 16px;
        text-decoration: none;
        margin-top: 20px;
    }

    .data-review-pelanggan .button:hover {
        background-color: #45a049;
    }
    .data-review-pelanggan .container {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
    }

    .data-review-pelanggan h2 {
        margin-bottom: 20px;
    }

    .data-review-pelanggan table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .data-review-pelanggan table th,
    .data-review-pelanggan table td {
        padding: 10px;
        border: 1px solid #ccc;
    }

    .data-review-pelanggan table th {
        background-color: #f8f8f8;
        font-weight: bold;
    }

    .data-review-pelanggan table td img {
        max-width: 100px;
    }
</style>

<?php include('footer.php'); ?>
<script src="script.js"></script>
</body>
</html>
