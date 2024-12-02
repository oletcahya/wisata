<div class="contianer-fluid">
    <div class="card">
        <div class="card-header"><strong>pengaturan akun</strong></div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group w-75">
                  <label>username</label>
                  <input type="text" name="username"  class="form-control" placeholder="Masukan Username"autocomplete="off" required >
                </div>

                <div class="form-group w-50">
                  <label>password</label>
                  <input type="password" class="form-control" name="password"  placeholder="masukan password" required>
                </div>

                <div class="form-group w-25">
                  <label>Konfirmasi password</label>
                  <input type="password" class="form-control" name="konfirmasi_password" placeholder="masukan kembali password" required>
                </div>

                <button type="submit" name="submit"class="btn btn-secondary">Update</button>
            </form>
            
            <?php

            if(isset($_POST['submit'])){
              $username       =$_POST['username'];
              $password       =$_POST['password'];
              $konfirmasi_password=$_POST['konfirmasi_password'];
              $id_user_login  =$_SESSION['idadmin'];

              if($password==$konfirmasi_password){
                $password_md5 =md5($password);
                mysqli_query($koneksi,"UPDATE tbl_admin SET username='$username', password='$password_md5' WHERE id_admin=$id_user_login");

                echo"<script>alert('Berhasil Diubah!');window.location ='dashboard.php?hal=user'</script>";

                

              }else{
               echo"<script>alert('password tidak sama!');window.location='dashboard.php?hal=user'</script>";
              }
            }
            ?>
        </div>
    </div>
</div>