<?php
require '../../koneksi.php';

$query = "SELECT * FROM tbl_wisata";
$sql = mysqli_query($koneksi, $query);

$wisata = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $wisata[] = $row;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Destination Profile</title>
    <link rel="stylesheet" href="/css/daftar-wisata.css">
</head>
<body>
    <?php require_once "../../component/navbar.php" ?>

    <div class="destination-list">
        <?php foreach ($wisata as $destination): ?>
            <?php
            // Fetch the category for the current destination
            $query = "SELECT * FROM tbl_kategori WHERE id_kategori = ?";
            $stmt = $koneksi->prepare($query);
            $stmt->bind_param("i", $destination['id_kategori']);
            $stmt->execute();
            $catwisata = $stmt->get_result()->fetch_assoc();
            ?>

            <div class="destination-card">
                <iframe class="destination-image" src="<?php echo htmlspecialchars($destination['link_peta']); ?>" frameborder="0" style="width:100%; height:400px;"></iframe>
                <div class="destination-content">
                    <h1 class="destination-name"><?php echo htmlspecialchars($destination['nama_wisata']); ?></h1>
                    <p class="destination-description">
                        <?php echo htmlspecialchars($destination['deskripsi']); ?>
                    </p>
                    <div class="destination-details">
                        <div class="detail-item">
                            <div class="detail-label">Lokasi</div>
                            <div class="detail-value"><?php echo htmlspecialchars($destination['lokasi_wisata']); ?></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label">Category</div>
                            <div class="detail-value"><?php echo htmlspecialchars($catwisata['nama_kategori']); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php require_once '../../component/footer.php' ?>
</body>
</html>
