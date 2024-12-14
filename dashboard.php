<?php
require_once"koneksi.php";

date_default_timezone_set('Asia/Jakarta');
session_start();
if(empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo'
  <center>
  <b>Maaf,Silahkan Melakukan Login</b><br>
  <b> Anda telah keluar dari sistem</b><br>
  <b> Atau anda belum melakukan login</b><br>

  <a href ="index.php" tittle="Klik Gambar Ini untuk kembali ke login"><img src="img/key.jpg" height="100" width="100"></img></a>
  </center> 
  ';
} else {
    //grafik wisata berdasarkan kategori
    $kategori_wisata = mysqli_query($koneksi,"SELECT * FROM tbl_kategori");
    while($r = mysqli_fetch_array($kategori_wisata)){
      $nama_kategori[]= $r['nama_kategori'];
      $jml_wisata = mysqli_query($koneksi,"SELECT COUNT(id_kategori) AS total FROM tbl_wisata  WHERE id_kategori = '$r[id_kategori]'");
      $a = mysqli_fetch_array($jml_wisata);
      $total_wisata[] = $a['total'];

    }
//grafik galeri berdasarkan wisata
$wisata = mysqli_query($koneksi,"SELECT * FROM tbl_wisata");
while($r1 = mysqli_fetch_array($wisata)){
  $nama_wisata[]= $r1['nama_wisata'];
  $jml_galeri = mysqli_query($koneksi,"SELECT COUNT(id_wisata) AS total_galeri FROM tbl_galeri  WHERE id_wisata = '$r1[id_wisata]'");
  $a1 = mysqli_fetch_array($jml_galeri);
  $total_galeri[] = $a1['total_galeri'];

}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>.:Dashboard - <?php echo ucwords (str_replace('_',' ', $_GET['hal'])) ?>:.</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="//cdn.ckeditor.com/4.25.0-lts/basic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <!-- GARFIK JAVASCRIPT -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  </head>
  <body>
     <div class ="container-fluid" >
        <div class="row">
            <div class="col-lg-12 py-2 bg-secondary fixed-top"  <title style="color:yellow;"><i class="bi bi-globe-asia-australia"></i><strong>CAHYA</strong></title>
            <div class="dropdown float-right">
  <button class="btn btn-dark  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Admin
  </button>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">
            <div class="media">
            <img class="align-self-center mr-3" src="img/logowisata.jpg" height="50" width="50" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0"><?php echo $_SESSION['namaadmin']?></h5>    
                <small><p class="mb-0"><i class="bi bi-clock-fill"></i> pkl <?php echo date('H:i:s') ?>wib</p></small>
            </div>
            </div>  
    </a>
    <a class="dropdown-item" href="dashboard.php?hal=user"><i class="bi bi-gear-wide-connected"></i> setting</a>
    <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?')"><i class="bi bi-box-arrow-right"></i> log out</a>
            </div>
            </div>
            </div>
        </div>

    <div class="row mt-4" style="padding-top:50px">
        <div class="col-lg-2 position-fixed vh-100">
            <div class="nav flex-column nav-pills  " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link <?php echo ($_GET['hal'] == 'home')? "active":""?> "  
                href="dashboard.php?hal=home" >Home</a>
                <a class="nav-link  <?php echo ($_GET['hal'] == 'profil')? "active":""?> "  
                href="dashboard.php?hal=profil" >Profil</a>
                <a class="nav-link  <?php echo (($_GET['hal'] == 'galeri') or ($_GET['hal'] == 'tambah_galeri') or ($_GET['hal'] == 'edit_galeri'))? "active":""?>"  
                href="dashboard.php?hal=galeri">Galeri</a>
                <a class="nav-link  <?php echo (($_GET['hal'] == 'wisata') or ($_GET['hal'] == 'tambah_wisata') or($_GET['hal'] == 'edit_wisata'))? "active":""?>" 
                 href="dashboard.php?hal=wisata" >Wisata</a>
                <a class="nav-link  <?php echo (($_GET['hal'] == 'kategori') or ($_GET['hal'] == 'tambah_kategori') or ($_GET['hal'] == 'edit_kategori'))? "active":""?>"  
                href="dashboard.php?hal=kategori" >Ketegori</a>
                <a class="nav-link  <?php echo (($_GET['hal'] == 'berita') or ($_GET['hal'] == 'tambah_berita'))? "active":""?>" 
                 href="dashboard.php?hal=berita" >Berita</a>
            </div>
        </div>

        <div class="col-lg-10 offset-2">

            <?php 

            if(isset($_GET['hal'])){

                switch($_GET['hal']){
                  case 'home':
                    include "modul/mod_home/home.php";
                    break;
                  case 'profil':
                      include "modul/mod_profil/profil.php";
                     break;
                  case 'galeri':
                        include "modul/mod_galeri/galeri.php";
                    break;
                  case 'tambah_galeri':
                      include "modul/mod_galeri/tambah_galeri.php";
                    break;
                  case 'edit_galeri':
                      include "modul/mod_galeri/edit_galeri.php";
                    break;
                  case 'hapus_galeri':
                      include "modul/mod_galeri/hapus_galeri.php";
                    break;
                  case 'wisata':
                      include "modul/mod_wisata/wisata.php";
                    break;
                  case 'tambah_wisata':
                      include "modul/mod_wisata/tambah_wisata.php";
                    break;
                  case 'edit_wisata':
                      include "modul/mod_wisata/edit_wisata.php";
                    break;
                  case 'hapus_wisata':
                      include "modul/mod_wisata/hapus_wisata.php";
                    break;
                  case 'kategori':
                      include "modul/mod_kategori/kategori.php";
                    break;
                  case 'tambah_kategori':
                      include "modul/mod_kategori/tambah_kategori.php";
                      break;
                  case 'berita':
                      include "modul/mod_berita/berita.php";
                    break;
                  case 'tambah_berita':
                    include "modul/mod_berita/tambah_berita.php";
                    break;
                    case 'website_berita':
                      include "modul/mod_website/website.php";
                      break;
                  
                  case 'edit_kategori':
                    include "modul/mod_kategori/edit_kategori.php";
                    break;
                  case 'hapus_kategori':
                    include "modul/mod_kategori/hapus_kategori.php";
                  break;
                  case 'hapus_berita';
                    include "modul/mod_berita/hapus_berita.php";
                  break;
                  case'user':
                    include "modul/mod_user/user.php";
                    break;

                  default :
                    echo "<h1><i> <b>Halaman Tidak Ditemukan</b></i></h1>";

        
                  

                }
            } else {
              header("location:dashboard.php?=home");
            }
            
            ?>
        </div>
    </div>

        
     </div> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
      const table = new DataTable('#example', {
    columnDefs: [
        {
            searchable: false,
            orderable: false,
            targets: 0
        }
    ],
    order: [[1, 'asc']]
});
 
table
    .on('order.dt search.dt', function () {
        let i = 1;
 
        table
            .cells(null, 0, { search: 'applied', order: 'applied' })
            .every(function (cell) {
                this.data(i++);
            });
    })
    .draw();

          const x = <?php echo json_encode($nama_kategori) ?>;
          const y =  <?php echo json_encode($total_wisata) ?>;
          const warna_bar = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
          ];

          new Chart("grafikwisata", {
            type: "doughnut",
            data: {
              labels: x,
              datasets: [{
                backgroundColor: warna_bar,
                data: y
              }]
            },
            options: {
              title: {
                display: true,
                text: "Jumlah Data wisata Berdasarkan Kategori"
              }
            }
          });

          const x1 = <?php echo json_encode($nama_wisata) ?>;
          const y1 =  <?php echo json_encode($total_galeri) ?>;
          const warna_bar1 = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
          ];

          new Chart("garfikgaleri", {
            type: "pie",
            data: {
              labels: x1,
              datasets: [{
                backgroundColor: warna_bar1,
                data: y1
              }]
            },
            options: {
              title: {
                display: true,
                text: "Jumlah Data wisata Berdasarkan Kategori"
              }
            }
          });
    </script>
  </body>
</html>

<?php
}
?>
