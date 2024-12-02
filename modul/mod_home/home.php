<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-group">
            <!-- <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                </div> -->

                <!-- CARD UNTUK GALERI -->
            <div class="card text-bg-warning mb-3 m-2 rounded-lg" style="max-width: 18rem;">
                <div class="card-body">
                    <?php
                    $sql_galeri = mysqli_query($koneksi,"SELECT * FROM tbl_galeri");
                    $jumlah_galeri = mysqli_num_rows($sql_galeri);
                    
                    ?>
                <h1 class="card-title"><?php echo $jumlah_galeri?> <i class="bi bi-card-image"></i></h1>
                <p class="card-text"> Total Data Galeri</p>
                </div>
             <div class="card-footer text-center"><a class="text-black" href="dashboard.php?hal=galeri" >View Data <i class="bi bi-reception-4"></i></a></div>
            </div>
 <!-- CARD UNTUK WISATA -->
            <div class="card text-bg-danger mb-3 m-3 rounded-lg" style="max-width: 18rem;">
                <div class="card-body">
                <?php
                    $sql_wisata = mysqli_query($koneksi,"SELECT * FROM tbl_wisata");
                    $jumlah_wisata = mysqli_num_rows($sql_wisata);
                    
                    ?>
                <h1 class="card-title"><?php echo $jumlah_wisata?> <i class="bi bi-globe-asia-australia"></i></h1>
                <p class="card-text"> Total Data wisata</p>
                </div>
             <div class="card-footer text-center"><a class="text-black" href="dashboard.php?hal=wisata" >View Data <i class="bi bi-clipboard-data"></i></a></div>
            </div>
 <!-- CARD UNTUK KATEGORI -->
            <div class="card text-bg-light mb-3 m-4 rounded-lg" style="max-width: 18rem;">
                <div class="card-body">
                <?php
                    $sql_kategori = mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
                    $jumlah_kategori = mysqli_num_rows($sql_kategori);
                    
                    ?>
                <h1 class="card-title"><?php echo $jumlah_kategori?> <i class="bi bi-collection"></i></h1>
                <p class="card-text"> Total Data kategori</p>
                </div>
             <div class="card-footer text-center"><a class="text-black" href="dashboard.php?hal=kategori" >View Data <i class="bi bi-bar-chart"></i></a></div>
            </div>
 <!-- CARD UNTUK BERITA -->
            <div class="card text-bg-info mb-3 m-5 rounded-lg" style="max-width: 18rem;">
                <div class="card-body">
                <?php
                    $sql_berita = mysqli_query($koneksi,"SELECT * FROM tbl_berita");
                    $jumlah_berita = mysqli_num_rows($sql_berita);
                    
                    ?>
                <h1 class="card-title"><?php echo $jumlah_berita?> <i class="bi bi-newspaper"></i></h1>
                <p class="card-text"> Total Data berita </p>
                </div>
             <div class="card-footer text-center"><a class="text-black" href="dashboard.php?hal=berita" >View Data <i class="bi bi-bar-chart-steps"></i></a></div>
            </div>

            </div>
        </div>
    </div>
    <div class="row border mt-2">
        <div class="col-md-6">
        <canvas id="grafikwisata" class="p-4" style="width:100%;max-width:596px"></canvas> 
        </div>
        <div class="col-md-6">
        <canvas id="garfikgaleri" class="p-4" style="width:100%;max-width:596px"></canvas> 
        </div>
    </div>

    <div class="row border mt-3">
        <div class="col-md-6">
        <table class="table table-sm table-bordered table-dark mt-2">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">wisata</th>
      <th scope="col">kategori</th>
      <th scope="col">lokasi</th>
    </tr>
            </thead>
            <tbody>
                <?php
                $query_wisata = mysqli_query($koneksi,"SELECT * FROM tbl_wisata,tbl_kategori WHERE tbl_wisata.id_kategori=tbl_kategori.id_kategori ORDER BY tbl_wisata.id_wisata DESC LIMIT 5");
                $no= 1;

                while($r=mysqli_fetch_array($query_wisata)){
                    ?>
                    <tr>
                <th scope="row"><?php echo$no++?></th>
                <td><?php echo $r['nama_wisata']?></td>
                <td><?php echo $r['nama_kategori']?></td>
                <td><?php echo $r['lokasi_wisata']?></td>
                </tr>
                    <?php
                }
                ?>
                

            </tbody>
            </table>
        </div>


        <div class="col-md-6">
        <table class="table table-sm table-bordered table-dark mt-2">
  <thead>
    <tr>
      <th scope="col">no</th>
      <th scope="col">judul berita</th>
      <th scope="col">penulis berita</th>
      
    </tr>
            </thead>
            <tbody>
                <?php
                $query_berita = mysqli_query($koneksi,"SELECT * FROM tbl_berita,tbl_admin WHERE tbl_berita.id_admin_berita=tbl_admin.id_admin ORDER BY tbl_berita.id_berita DESC LIMIT 5");
                $no= 1;

                while($a=mysqli_fetch_array($query_berita)){
                    ?>
                    <tr>
                <th scope="row"><?php echo$no++?></th>
                <td><?php echo $a['judul_berita']?></td>
                <td><?php echo $a['nama_admin']?></td>
                
                </tr>
                    <?php
                }
                ?>
                

            </tbody>
            </table>
        </div>
    </div>
</div>