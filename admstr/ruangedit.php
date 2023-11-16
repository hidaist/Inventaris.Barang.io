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
<?php
// Display selected user data based on id
// Getting id from url
include_once "../librari/inc.koneksi.php";

if (! $_GET['kdubah']=="") {
        $sql  = "SELECT * FROM ruang Where kd_ruang='".$_GET['kdubah']."'";
 //       echo"$sql";
        $qry  = mysqli_query($koneksi, $sql) or die ("Gagal sql");
        $data = mysqli_fetch_array($qry);
        
                $kdruang           = $data['kd_ruang'];
                $nmruang           = $data['nm_ruang'];
				$detailruang       = $data['detail_ruang'];
        
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
                                                <h3 class="text-body help-block"> Edit Data Ruang</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Ruang</label>
                                                <input id="cc-kode" 
                                                name="kdruangin"
                                                value="<?php echo $kdruang; ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Nama Ruang</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="nmruangin"
                                                    value="<?php echo $nmruang;?>" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label for="cc-number" class="control-label mb-1">Detail Ruang</label>
                                                    <textarea id="cc-textarea" 
                                                    name="detailruangin" 
                                                    class="form-control" required><?php echo $detailruang;?></textarea>
                                                    
                                                </div>
                                                <div>
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="update">
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
    if(isset($_POST['update'])) {
        $kdruangin 	    = mysqli_real_escape_string($koneksi, $_POST['kdruangin']);
        $nmruangin 		= mysqli_real_escape_string($koneksi, $_POST['nmruangin']);
        $detailruangin 	= mysqli_real_escape_string($koneksi, $_POST['detailruangin']);
		
		
        
       
                
        // Insert user data into table
        $add = mysqli_query($koneksi, " UPDATE  ruang SET
                            nm_ruang        	    = '$nmruangin',
                            detail_ruang        	= '$detailruangin'
                            WHERE
                            kd_ruang       	        = '$kdruangin'
                            ");
		echo $add;
        if ($add) {
            echo "<font color='red'> Berhasil di Update. </font>" ;
          echo"<script>document.location='?page=lihatruang&blok1=true';</script>";
      // Mengarahkan ke halaman ruangtampil.php
      exit();
    		} else {
      		die ('Gagal!' .mysqli_error($koneksi));
    	}
    }
    ?>
</div>
</body>
<script>
  var textarea = document.getElementById('cc-textarea');

  textarea.addEventListener('blur', function() {
    if (textarea.value.trim() === '') {
      textarea.setCustomValidity('Textarea tidak boleh kosong.');
    } else {
      textarea.setCustomValidity('');
    }
  });
</script>
</html>
