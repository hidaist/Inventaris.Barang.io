<?php 
// cek session
// cek session sangat penting untuk USER yang ingin masuk/login tanpa proses login.
include "../cek_login.php";
//cek level
if ($_SESSION['level'] != 'admin') // hanya level admin yang boleh masuk
{
	header ('location:login.php?code=3');
}
?>
<?php include_once "../librari/inc.koneksi.php";
if (! $_GET['resetpass']=="") {
    $sql  = "SELECT * FROM users WHERE kd_user='".$_GET['resetpass']."'";
     //echo"$sql";
    $qry  = mysqli_query($koneksi, $sql) or die ("Gagal sql");
    $data = mysqli_fetch_array($qry);
    
            $kduser         = $data['kd_user'];
            $email          = $data['email'];
            $nama           = $data['nama'];
      
    
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit User Pengguna</title>

</head>

<body>
<div class="content mt-3">
	<div class="animated fadeIn">
     <form action="" method="post" class="form-group" enctype='multipart/form-data'>
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Reset Password</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode User</label>
                                                <input id="cc-kode" 
                                                name="kduser"
                                                value="<?php echo $kduser; ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Nama User</label>
                                                <input id="cc-kode" 
                                                name=""
                                                value="<?php echo $nama; ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                                    <div class="form-group has-success">
                                                        <label for="cc-name" class="control-label mb-1">Password Baru</label>
                                                        <input
                                                            id="password"
                                                            name="password"
                                                            type="password"
                                                            class="form-control"
                                                            required
                                                        >
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="cc-name" class="control-label mb-1">Konfirmasi Password</label>
                                                        <input
                                                            id="password_confirmation"
                                                            name="password_confirmation"
                                                            type="password"
                                                            class="form-control"
                                                            required
                                                        >
                                                        <p id="passwordMatchMessage"></p>
                                                    </div>

                                                    <script>
                                                        var password = document.getElementById("password");
                                                        var confirm_password = document.getElementById("password_confirmation");
                                                        var message = document.getElementById("passwordMatchMessage");

                                                        function validatePassword() {
                                                            if (password.value === confirm_password.value) {
                                                                message.innerHTML = "Password cocok";
                                                                message.style.color = "green";
                                                            } else {
                                                                message.innerHTML = "Password tidak cocok";
                                                                message.style.color = "red";
                                                            }
                                                        }

                                                        password.onkeyup = validatePassword;
                                                        confirm_password.onkeyup = validatePassword;
                                                    </script>
                                                    
                                                <div>
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="">Simpan Data</span>
                                                        
                                                    </button>
                                                </div>
     
     </form>
	</div>
    <?php
    // include database connection file
    include_once "../librari/inc.koneksi.php"; 
    // Check If form submitted, insert form data into tb_absen.
    if(isset($_POST['submit'])) {
        $kduser             = mysqli_real_escape_string($koneksi, $_POST['kduser']);
        $password           = mysqli_real_escape_string($koneksi, $_POST['password']); 
        $hashedPassword     = md5($password);


        var_dump($kduser, $password, $hashedPassword);       
        // Insert  data into table
        $add = mysqli_query($koneksi, " UPDATE  users  SET
                            
                                            password       	        = '$hashedPassword'
                                                           WHERE
                                            kd_user        	        = '$kduser'
                                            ");
                           
                         

		//echo $add;
        if ($add) {
            echo "<font color='red'> Berhasil di Update. </font>";
             echo "<script>
            document.location = '?page=tampiluser&blok1=true';
            </script>";
        exit();
        } else {
                die ('Gagal!' .mysqli_error($koneksi));
          }
      }
      ?>
</div>

</body>
</html>
