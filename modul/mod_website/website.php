<div class="container-fluid">
    <div class="card">
        <div class="card-header">
        <a href="dashboard.php?hal=tambah_berita" class="btn btn-dark"><i class="bi bi-plus-circle-dotted"></i>  Data Berita</a>    
            
    </div>
            <div class="card-body">
            <table id="example" class="display" style="width:100%">
             <thead>
            <tr>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = mysqli_query($koneksi,"SELECT * FROM tbl_berita, tbl_admin WHERE tbl_berita.id_admin_berita=tbl_admin.id_admin ORDER BY tanggal_berita ");
            while($r = mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td></td>
                <td><?php echo $r ['judul_berita']?></td>
                
            </tr>
            <?php
            }

            ?>


        </tbody>
    </table>
           
        </div>
    </div>

</div>