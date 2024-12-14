<?php
include 'koneksi.php';

$query = "SELECT * FROM tbl_profil LIMIT 1";
$sql = mysqli_query($koneksi, $query);

$profil = mysqli_fetch_assoc($sql);

$query = "SELECT * FROM tbl_kategori";
$sql = mysqli_query($koneksi, $query);

$categories = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $categories[] = $row;
}

$query = "SELECT * FROM tbl_berita LIMIT 3";
$sql = mysqli_query($koneksi, $query);

$berita = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $berita[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Travel - Your Gateway to Extraordinary Journeys</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include 'component/navbar.php' ?>

    <section style="background-image: url('img_profil/<?= htmlspecialchars($profil['foto_profil']) ?>');" class="hero">
        <div class="container">
            <h1 class="hero-text">Jelajahi Lampung Bersama Kami</h1>
            <p class="hero-text-desc"><?= nl2br(htmlspecialchars($profil['konten_profil'])) ?>
            </p>
            <a href="#" class="cta-button">Start Your Journey</a>
        </div>
    </section>

    <section class="travel-categories">
        <div class="container">
            <p class="section-title-head">CATEGORY</p>
            <h2 class="section-title">Kategori Wisata Terbaik Kami</h2>

            <div class="categories-grid">
                <?php foreach ($categories as $category): ?>
                    <div class="category-card">
                        <img src="<?= htmlspecialchars($category['url_img']) ?>"
                            alt="<?= htmlspecialchars($category['nama_kategori']) ?>" width="200" height="400">
                        <div class="category-card-content">
                            <h3><?= htmlspecialchars($category['nama_kategori']) ?></h3>
                            <p><?= htmlspecialchars($category['keterangan']) ?></p>
                            <a class="category-btn"
                                href="/halaman/wisata/kategori-wisata.php?catid=<?php echo $category['id_kategori'] ?>">Read
                                More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="booking-section">
            <div class="booking-left-section">
                <p class="booking-subtitle">Mudah Dan Cepat</p>
                <h1>Pesan tujuan wisata Anda dalam 3 langkah mudah!</h1>
                <div class="booking-steps">
                    <div class="booking-step">
                        <div class="booking-step-icon" style="background-color: #fef7e5;">
                            <i class="fa-solid fa-tree"></i>
                        </div>
                        <div class="booking-step-content">
                            <h3>Pilih Destinasi Wisata</h3>
                            <p>Pilih destinasi wisata yang tersedia pada layanan kami</p>
                        </div>
                    </div>
                    <div class="booking-step">
                        <div class="booking-step-icon" style="background-color: #fde8e8;">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <div class="booking-step-content">
                            <h3>Pesan Ke Whatsapp</h3>
                            <p>Setelah memilih destinasi wisata,</p>
                            <p>kirim pesan ke <a href="https://wa.me/6287868853973" class="whatsapp-link ">WhatsApp kami</a> untuk kami proses</p>
                        </div>
                    </div>
                    <div class="booking-step">
                        <div class="booking-step-icon" style="background-color: #e5f7f6;">
                            <i class="fa-solid fa-truck-pickup"></i>
                        </div>
                        <div class="booking-step-content">
                            <h3>Kami Kirim Info Penjemputan</h3>
                            <p>Kami kirim info jadwal penjemputan beserta pesanan tiket dan akomodasi lainya</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="booking-right-section">
                <div class="booking-card">
                    <img src="/img/danau_ranau.jpg" alt="Trip to Greece" class="booking-card-image">
                    <div class="booking-card-content">
                        <div class="booking-card-header">
                            <h2 class="booking-card-title">Trip Bareng Smart Travel</h2>
                            <span class="booking-badge">Mendatang</span>
                        </div>
                        <p class="booking-card-details">14-29 June &nbsp;&nbsp;|&nbsp;&nbsp; by Admin</p>
                        <p>Trip bareng bersama smart travel bersama Ke Pantai Labuhan Jukung Krui, Kabupaten Pesisir
                            Barat ini, salah satu pantai terindah di Lampung. Pantainya yang berombak besar juga bisa
                            untuk surfing, <a href="">Info Selengkapnya</a></p>
                    </div>
                </div>
            </div>
        </div> -->
    </section>

    <!-- <section class="profile-wisata-section">
        <div class="profile-wisata-container">
            <div class="profile-wisata-wrap">
                <div class="profile-wisata-image-container">
                    <img width="500" height="500" src="/img_profil/<?= htmlspecialchars($profil['foto_profil']) ?>"
                        alt="Foto Profil">
                </div>
                <div class="profile-wisata-content">
                    <p class="profile-wisata-label">PROFIL</p>
                    <h2 class="profile-wisata-title">Profil Wisata</h2>
                    <p class="profile-wisata-description">
                        <?= nl2br(htmlspecialchars($profil['konten_profil'])) ?>
                    </p>
                </div>
            </div>
        </div>
    </section> -->

    <section class="news-section">
        <div class="container">
            <h2 class="section-title">Berita Terbaru Kami</h2>
            <div class="news-grid">
                <?php foreach ($berita as $berita): ?>
                    <div class="news-card">
                        <img src="<?php echo "img_berita/" . htmlspecialchars($berita['foto_berita']); ?>"
                        alt="<?php echo htmlspecialchars($category['judul_berita'] ?? ''); ?>">
                        <div class="news-card-content">
                            <h3><?php echo htmlspecialchars($berita['judul_berita']); ?></h3>
                            <p class="news-card-content-desc"><?php echo htmlspecialchars($berita['konten_berita']); ?></p>
                            <a href="/halaman/berita/berita.php?id=<?php echo $berita['id_berita']; ?>"
                                class="read-more">Read
                                More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php require_once './component/footer.php' ?>
</body>

</html>