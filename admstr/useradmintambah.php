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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tamabah ruang Inventarisasi</title>
<meta name="description" content="Sufee Admin - HTML5 Admin Template">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" href="apple-icon.png">
<link rel="shortcut icon" href="favicon.ico">


<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
<link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

<link rel="stylesheet" href="assets/css/style.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
<div class="content mt-3">
	<div class="animated fadeIn">
     <form action="" method="post" class="form-group">
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Tambah User Admin</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Admin</label>
                                                <input id="cc-kode" 
                                                name="kdadmin"
                                                value="<?php echo 'KAD-' . uniqid(); ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">User Admin</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="useradmin" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                               </div>
                                                <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Level</label>
                                                <select required name="cmblevel" data-placeholder="" class="standardSelect" tabindex="1" >
                                                    <option value="">Pilih Level</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="petugas">Petugas</option>
                                                </select>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Password</label>
                                                    <div class="input-group">
                                                        <input 
                                                            id="cc-name" 
                                                            name="pass" 
                                                            type="password" 
                                                            class="form-control fa fa-eye" 
                                                            required>
                                                    </div>
                                                </div>
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
        $kdadmin 	        = mysqli_real_escape_string($koneksi, $_POST['kdadmin']);
        $useradmin 		    = mysqli_real_escape_string($koneksi, $_POST['useradmin']);
        $db_pass1 		    = mysqli_real_escape_string($koneksi, $_POST['pass']);
        $cmblevel 	        = mysqli_real_escape_string($koneksi, $_POST['cmblevel']);
        
        $hashedPassword = md5($db_pass1);
		
        
        
        
                
        // Insert user data into table
        $add = mysqli_query($koneksi, " INSERT INTO  admin SET
                            kode_admin       	    = '$kdadmin',
                            username        	    = '$useradmin',
                            password            	= '$hashedPassword',
                            level        	        = '$cmblevel'
                            ");
		//echo $add;
        if ($add) {
          echo "<font color='red'> Berhasil di Update. </font>" ;
          echo"<script>document.location='?page=lihatuseradmin&blok1=true';</script>";
      // Mengarahkan ke halaman ruangtampil.php
      exit();
    		} else {
      		die ('Gagal!' .mysqli_error($koneksi));
    	}
    }
    ?>
</div>

</body>

</html>
