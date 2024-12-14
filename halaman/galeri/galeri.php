<?php
require '../../koneksi.php';
$query = "SELECT * FROM tbl_galeri";
$sql = mysqli_query($koneksi, $query);

$gallery = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $gallery[] = $row;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Wisata</title>
    <link rel="stylesheet" href="/css/galeri.css">
</head>
<body>
    <?php require_once '../../component/navbar.php' ?>
    <div class="container-galery">
        <h1>Image Gallery</h1>
        <div class="gallery">
            <?php foreach ($gallery as $item): ?>
                <div class="gallery-item" style="background-image: url('/img_galeri/<?= htmlspecialchars($item['nama_foto']) ?>');">
                    <div class="overlay">
                        <div class="caption"><?= htmlspecialchars($item['keterangan_foto']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php require_once '../../component/footer.php'?>
</body>
</html>
