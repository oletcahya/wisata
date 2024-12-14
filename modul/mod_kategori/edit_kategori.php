<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <strong>Form Update Data</strong>
        </div>
        <div class="card-body">
            <?php
            $id = $_GET['id'];
            $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kategori WHERE id_kategori='$id'");
            $r = mysqli_fetch_array($sql);
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_kategori" value="<?= htmlspecialchars($id) ?>">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori"
                        value="<?= htmlspecialchars($r['nama_kategori']) ?>">
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="2"><?= htmlspecialchars($r['keterangan']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="url_image">Upload Gambar:</label>
                    <input type="file" name="url_image" id="url_image" accept="image/*">
                    <?php if (!empty($r['url_img'])): ?>
                        <p>Gambar Saat Ini:</p>
                        <img src="<?= htmlspecialchars($r['url_img']) ?>" alt="Gambar Saat Ini" width="200">
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-dark"><b>Update</b></button>
                </div>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $id_kategori = $_POST['id_kategori'];
                $nama_kategori = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
                $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

                $query_update = "";

                if (!empty($_FILES['url_image']['name'])) {
                    $target_dir = "img_kategori/";
                    $filename = basename($_FILES['url_image']['name']);
                    $target_file = $target_dir . time() . '_' . $filename;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

                    if (in_array($imageFileType, $allowed_types)) {
                        if (move_uploaded_file($_FILES['url_image']['tmp_name'], $target_file)) {
                            if (!empty($r['url_img']) && file_exists($r['url_img'])) {
                                unlink($r['url_img']); // Hapus gambar lama
                            }
                            $query_update = "UPDATE tbl_kategori SET 
                                nama_kategori = '$nama_kategori', 
                                keterangan = '$keterangan', 
                                url_img = '$target_file' 
                                WHERE id_kategori = '$id_kategori'";
                        } else {
                            echo "<script>alert('Gagal mengunggah gambar.');</script>";
                        }
                    } else {
                        echo "<script>alert('Format file tidak valid. Hanya diperbolehkan JPG, JPEG, PNG, atau GIF.');</script>";
                    }
                } else {
                    $query_update = "UPDATE tbl_kategori SET 
                        nama_kategori = '$nama_kategori', 
                        keterangan = '$keterangan' 
                        WHERE id_kategori = '$id_kategori'";
                }

                if ($query_update) {
                    if (mysqli_query($koneksi, $query_update)) {
                        echo "<script>alert('KATEGORI BERHASIL DI UPDATE');window.location = 'dashboard.php?hal=kategori'</script>";
                    } else {
                        echo "<script>alert('Gagal memperbarui data.');</script>";
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
