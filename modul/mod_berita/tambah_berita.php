<div class="container-fluid">
    <div class="card">
        <div class="card-header"><strong>Form Tambah Data Berita Wisata</strong></div>
        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Judul Berita</label>
              <input type="text" class="form-control" name="judul_berita" placeholder="masukan judul berita">
            </div>
            <div class="form-group">
              <label>Konten Berita</label>
              <textarea class="form-control ckeditor" name="konten_berita" id="ckeditor" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label>Foto Berita</label>
              <input type="file" class="form-control-file" name="foto_berita">
              <small id="fileHelpId" class="form-text text-muted">upload file image (jpg,jpeg,png)</small>
            </div>
            <div class=form-group>
                <button type="submit" name="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
        <?php
            if (isset($_POST['submit'])){
             $judul_berita = $_POST['judul_berita'];
             $konten_berita = $_POST['konten_berita'];

            $foto_berita = $_FILES['foto_berita']['name'];

            $file_extension = array('png','jpg','jpeg','gif');
            $extension = pathinfo($foto_berita, PATHINFO_EXTENSION);
            $size_foto_berita = $_FILES['foto_berita']['size'];
            $rand = rand();

            $penulis = $_SESSION['idadmin'];
            $tanggal = date('Y-m-d');

            if (!in_array($extension,$file_extension)){
                echo "<script>alert('File YANG ANDA MASUKAN Tidak DIDUKUNG!'); window.location = 'dashboard.php?hal=tambah_berita'</script>";
            } else {
                if ($size_foto_berita < 444444){
                    $nama_foto_berita = $rand.'_'.$foto_berita;

                    move_uploaded_file($_FILES['foto_berita']['tmp_name'], '././img_berita/'.$nama_foto_berita);

                    mysqli_query($koneksi,"INSERT INTO tbl_berita(judul_berita,id_admin_berita,tanggal_berita,konten_berita,foto_berita) VALUES('$judul_berita','$penulis','$tanggal','$konten_berita','$nama_foto_berita')");

                    echo"<script>alert('BERITA YANG ANDA INPUT BERHASIL DITAMBAHKAN');window.location='dashboard.php?hal=berita'</script>";
                } else {
                   echo"<script>alert('UKURAN FILE IMAGE ANDA TERLALU BESAR!');window.location='dashboard.php?hal=tambah_berita'</script>"; 
                }
            }
        }



        ?>
        </div>
    </div>
</div>