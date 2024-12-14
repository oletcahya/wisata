<?php
require '../../koneksi.php';

$phpid = isset($_GET['catid']) ? intval($_GET['catid']) : 0;

$query = "SELECT * FROM tbl_wisata WHERE id_kategori = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $phpid);
$stmt->execute();
$wisata = $stmt->get_result();

$query = "SELECT * FROM tbl_kategori WHERE id_kategori = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $phpid);
$stmt->execute();
$catwisata = $stmt->get_result()->fetch_assoc();

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
            <div class="destination-card">
                <iframe class="destination-image" src="<?php echo $destination['link_peta'] ?>"></iframe>
                <div class="destination-content">
                    <h1 class="destination-name"><?php echo $destination['nama_wisata']; ?></h1>
                    <p class="destination-description">
                        <?php echo $destination['deskripsi']; ?>
                    </p>
                    <div class="destination-details">
                        <div class="detail-item">
                            <div class="detail-label">Lokasi</div>
                            <div class="detail-value"><?php echo $destination['lokasi_wisata']; ?></div>
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