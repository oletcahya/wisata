<?php

include '../../koneksi.php';

$phpid = isset($_GET['id']) ? intval(value: $_GET['id']) : 0;

$query = "SELECT * FROM tbl_berita WHERE id_berita = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $phpid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows <= 0) {
    Header("Location: /404.php");
} else {
    $berita = $result->fetch_assoc();
}


$author_berita_query = "SELECT * FROM tbl_admin WHERE id_admin = ?";
$author_berita_stmt = $koneksi->prepare($author_berita_query);
$author_berita_stmt->bind_param("i", $berita['id_admin_berita']);
$author_berita_stmt->execute();
$author_berita_result = $author_berita_stmt->get_result();

if ($author_berita_result->num_rows > 0) {
    $author_berita = $author_berita_result->fetch_assoc();
} else {
    $author_berita = ['nama_admin' => 'Unknown Author'];
}

$berita_lainya_query = "SELECT * FROM tbl_berita WHERE id_berita != ? LIMIT 3";
$berita_lainya_stmt = $koneksi->prepare($berita_lainya_query);
$berita_lainya_stmt->bind_param("i", $phpid);
$berita_lainya_stmt->execute();
$berita_lainya_result = $berita_lainya_stmt->get_result();

?>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita <?php echo htmlspecialchars($berita['judul_berita']); ?></title>
    <link rel="stylesheet" href="../../css/berita.css">
</head>

<body>
    <?php include '../../component/navbar.php' ?>

    <div class="content-container">
        <main class="main-article">
            <div class="article-header">
                <h1><?php echo htmlspecialchars($berita['judul_berita']); ?></h1>
                <p class="article-author">Author Berita - <?php echo htmlspecialchars($author_berita['nama_admin']); ?>
                </p>
                <p class="article-date"><?php echo date('d F Y', strtotime($berita['tanggal_berita'])); ?></p>
                <img src="/img_berita/<?php echo htmlspecialchars($berita['foto_berita']); ?>" alt="Foto Berita">
            </div>

            <div class="article-content">
                <p><?php echo nl2br(htmlspecialchars($berita['konten_berita'])); ?></p>
            </div>
        </main>

        <aside class="sidebar">
            <div class="related-news">
                <h2>Berita Lainnya</h2>

                <?php while ($related_berita = $berita_lainya_result->fetch_assoc()): ?>
                    <div class="news-item">
                        <img src="/img_berita/<?php echo htmlspecialchars($related_berita['foto_berita']); ?>"
                            alt="<?php echo htmlspecialchars($related_berita['judul_berita']); ?>" height="80" width="100">
                        <div class="news-details">
                            <h3><?php echo htmlspecialchars($related_berita['judul_berita']); ?></h3>
                            <span class="views-count"><a
                                    href="/halaman/berita/berita.php?id=<?php echo htmlspecialchars($related_berita['id_berita']); ?>">Lihat
                                    selengkapnya</a></span> <!-- You can implement view count if needed -->
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </aside>
    </div>

    <?php require_once '../../component/footer.php'?>
</body>

</html>