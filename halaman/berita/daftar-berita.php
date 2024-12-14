<?php
include '../../koneksi.php';

$berita_query = "SELECT * FROM tbl_berita";
$berita_stmt = $koneksi->prepare($berita_query);
$berita_stmt->execute();
$berita_result = $berita_stmt->get_result();
?>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar berita</title>
    <link rel="stylesheet" href="/css/berita.css">
</head>

<body>
    <?php require_once '../../component/navbar.php' ?>
    <div style="padding-bottom: 12vh" class="container-list-berita">
        <div class="news-list-head-banner">
            <h1>Berita Terbaru</h1>
        </div>
        <div class="news-list-grid">
            <?php while ($berita = $berita_result->fetch_assoc()) { ?>
                <div class="news-list-item">
                    <img src="/img_berita/<?= $berita['foto_berita'] ?: 'null' ?>"
                        alt="<?= htmlspecialchars($berita['judul_berita']) ?>" class="news-list-image">
                    <div class="news-list-content">
                        <h2 class="news-list-title"><?= htmlspecialchars($berita['judul_berita']) ?></h2>
                        <p class="news-list-excerpt"><?= htmlspecialchars($berita['konten_berita']) ?></p>
                        <p class="news-list-date"><?= date('F j, Y', strtotime($berita['tanggal_berita'])) ?></p>
                        <a class="news-list-detail-btn"
                            href="/halaman/berita/berita.php?id=<?= $berita['id_berita'] ?>">Baca Selengkapnya</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
        <?php require_once '../../component/footer.php'?>
</body>

</html>