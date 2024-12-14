<div class="container-fluid">
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <?php
           
            $id = $_GET['id'];
            $sql = mysqli_query($koneksi,"SELECT * FROM tbl_galeri WHERE id_galeri=$id");
            $r = mysqli_fetch_array($sql);
            
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>keterangan foto</label>
                    <textarea class="form-control" name="keterangan_foto" rows="2"><?php echo $r['keterangan_foto']?></textarea>
                </div>
                <div class="form-group">
                    <label>Nama Wisata</label>
                    <select name="id_wisata" class="form-control">
                        <?php
                        if($r['id_wisata'] == 0){ ?>
                            <option value="0" selected>---pilih wisata---</option>
                            <?php
                        }

                        $tampil = mysqli_query($koneksi,"SELECT * FROM tbl_wisata");
                        while($a = mysqli_fetch_array($tampil)){
                            if($r['id_wisata'] == $a['id_wisata']){
                                ?>
                                <option value="<?php echo $a['id_wisata']?>" selected><?php echo $a['nama_wisata']?></option>
                                <?php
                             } else{ ?>
                                    <option value="<?php echo $a['id_wisata']?>"><?php echo $a['nama_wisata']?></option>

                             <?php

                             }
                        }
                        ?>
                       
                    </select>
                </div>
                <div class="form-group">
                    <label>foto</label>
                    <input type="file" class="form-control-file" name="nama_foto">
                    <img  class="mt-4" src="././img_galeri/<?php echo $r['nama_foto'] ?>" height="100" width="100">
                    <small class="form-text text-muted">*Gambar Lama</small>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-dark">Update</button>
                </div>
            </form>
            <?php
            if (isset($_POST['submit'])){
                $keterangan_foto = $_POST['keterangan_foto'];
                $id_wisata =$_POST['id_wisata'];
                $nama_foto = $_FILES['nama_foto']['name'];

                $extension_foto = pathinfo($nama_foto,PATHINFO_EXTENSION);
                $size_foto = $_FILES['nama_foto']['size'];

                if  (empty($nama_foto)){
                    mysqli_query($koneksi,"UPDATE tbl_galeri SET keterangan_foto ='$keterangan_foto',id_wisata='$id_wisata' WHERE id_galeri='$id'");
                    echo "<script>alert('GALERI BERHASIL DI UPDATE');window.location ='dashboard.php?hal=galeri'</script>";
                }else{
                    if (!in_array($extension_foto,array('png','jpg','jpeg','gif'))){
                        echo "<script>alert('file tidak didukung!');window.location ='dashboard.php?hal=edit_galeri&id=$id'</script>";
                    }else{
                        if($size_foto > 2048){
                            echo "<script>alert('file terlalu besar!');window.location ='dashboard.php?hal=edit_galeri&id=$id'</script>";
                        } else {
                            $nama_foto_baru = rand().'_'.$nama_foto;

                            unlink("././img_galeri/".$r['nama_foto']);

                            move_uploaded_file($_FILES['nama_foto']['tmp_name'],'././img_galeri/'.$nama_foto_baru);

                            mysqli_query($koneksi,"UPDATE tbl_galeri SET keterangan_foto ='$keterangan_foto',id_wisata='$id_wisata',nama_foto = '$nama_foto_baru' WHERE id_galeri='$id'");
                            echo "<script>alert('GALERI BERHASIL DI UPDATE');window.location ='dashboard.php?hal=galeri'</script>";

                        }
                    }


                    }
                }
            
            ?>
        </div>
    </div>
</div>