<div class="container-fluid">
    <div class="card">
        <div class="card-header"><strong>Form Update Data</strong></div>
        <div class="card-body">

        <?php
        $id = $_GET['id'];
        $sql = mysqli_query($koneksi,"SELECT * FROM tbl_wisata WHERE id_wisata='$id'");
        $r = mysqli_fetch_array($sql);
        ?>

        <form action="" method="POST">
            <div class="form group w-25">
                <label>Nama Wisata</label>
                <input type="text" name="nama_wisata" class="form-control" value="<?php echo $r['nama_wisata']?>">
            </div>

            <div class="form group w-50">
                <label>Kategori Wisata</label>
                <select name="id_kategori" class="form-control">
                    <?php
                        if($r['id_kategori'] == 0){ ?>
                        <option value="0" selected>__Pilih Kategori Wisata___</option>
                        <?php
                        }

                        $tampil = mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
                        while($a = mysqli_fetch_array($tampil)){
                            if ($r['id_kategori'] ==$a['id_kategori']){ ?>
                                <option value="<?php echo $a['id_kategori'] ?>" selected><?php echo$a['nama_kategori'] ?></option>
                                <?php
                            }else { ?>
                                <option value="<?php echo $a['id_kategori'] ?>" selected><?php echo$a['nama_kategori'] ?></option>
                                <?php
                            }
                        }
                    ?>

                   
                </select>
            </div>

            <div class="form group w-75">
                <label>Lokasi wisata</label>
                <input type="text" name="lokasi_wisata" class="form-control" value="<?php echo$r['lokasi_wisata'] ?>">
            </div>

            <div class="form group">
                <label>Link Peta</label>
                <textarea rows="4" class="form-control" name="link_peta"><?php echo$r['link_peta'] ?></textarea>
            </div>

            <div class="form group">
                <label>Deskripsi</label>
                <textarea rows="5" class="form-control ckeditor" id="ckeditor" name="deskripsi"><?php echo$r['deskripsi'] ?></textarea>
            </div>
            <div class="form group">
            <button type="submit" name="submit" class="btn btn-dark"><b>Update</b></button>

            </div>  
        </form>
        <?php
        if (isset($_POST['submit'])){
            $nama_wisata =$_POST['nama_wisata'];
            $id_kategori =$_POST['id_kategori'];
            $lokasi_wisata =$_POST['lokasi_wisata'];
            $link_peta=$_POST['link_peta'];
            $deskripsi =$_POST['deskripsi'];

            mysqli_query($koneksi,"UPDATE tbl_wisata SET nama_wisata='$nama_wisata',id_kategori='$id_kategori',lokasi_wisata='$lokasi_wisata',link_peta='$link_peta',deskripsi='$deskripsi' WHERE id_wisata='$id'");
            echo "<script>alert('WISATA BERHASIL DI UPDATE');window.location = 'dashboard.php?hal=wisata'</script>";
        }
        ?>
        </div>
    </div>
</div>