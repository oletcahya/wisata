<div class="container-fluid">
    <div class="card">
        <div class="card-header"><b>Form Tambah Data Galeri</b></div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
               <div class="form-group">
                <label>Keterangan Foto</label>
                <textarea rows="2" class="form-control" name="keterangan_foto" placeholder="masukan keterangan foto"></textarea>
               </div>
               <div class="form-group">
                <label>Nama Wisata</label>
                <select name="id_wisata" class="form-control">
                    <option value="0">==pilih wisata==</option>
                    <?php
                    $sql = mysqli_query($koneksi,"SELECT * FROM tbl_wisata ORDER BY id_wisata ASC ");
                    while($r = mysqli_fetch_array($sql)){ ?>
                        <option value="<?php echo $r['id_wisata']?>"><?php  echo $r['nama_wisata']?></option>
                    
                    <?php }

                    ?>
                </select>
               </div>
               <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control-file" name="nama_foto">
               </div>

               <div class="form-group">
                <button type="submit" class="btn btn-dark" name="submit">Submit</button>
               </div>
            </form>
            <?php
            if (isset($_POST['submit'])){
                $keterangan_foto = $_POST['keterangan_foto'];
                $id_wisata = $_POST['id_wisata'];
                $nama_foto = $_FILES['nama_foto']['name'];
                 
                $extension_foto = pathinfo($nama_foto,PATHINFO_EXTENSION);
                $size_foto = $_FILES['nama_foto']['size'];
                if (!in_array($extension_foto,array('png','jpg','jpeg','gif'))){
                    echo "<script>alert('FILE TIDAL DIDUKUNG');window.location ='dashboard.php?hal=tambah_galeri'</script>";
                }else{
                    if($size_foto > 444444){
                        echo "<script>alert(' file terlalu Besar');window.location ='dashboard.php?hal=tambah_galeri'</script>";
                    }else{
                        $nama_foto_baru = rand().'_'.$nama_foto;
                         move_uploaded_file($_FILES['nama_foto']['tmp_name'],'././img_galeri/'.$nama_foto_baru);

                         mysqli_query($koneksi,"INSERT INTO tbl_galeri(keterangan_foto,id_wisata,nama_foto)VALUES ('$keterangan_foto','$id_wisata','$nama_foto_baru') ");

                         echo "<script>alert('GALERI BERHASIL DITAMBAHKAN');window.location ='dashboard.php?hal=galeri'</script>";
                    }
                }
            }
            ?>
        </div>
    </div>
</div>