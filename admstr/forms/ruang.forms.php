<?php 
error_reporting(0);
// cek session
// cek session sangat penting untuk USER yang ingin masuk/login tanpa proses login.
include "../../cek_login.php";
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

if (!empty($_GET['kdubah'])) {
        $sql  = "SELECT * FROM ruang Where kd_ruang='".$_GET['kdubah']."'";
 //       echo"$sql";
        $qry  = mysqli_query($koneksi, $sql) or die ("Gagal sql");
        $data = mysqli_fetch_array($qry);
        
                $kdruang           = $data['kd_ruang'];
                $nmruang           = $data['nm_ruang'];
				        $detruang          = $data['detail_ruang'];
        
}
//buat variable untuk edit form
$koderuang      = ($kdruang  != "") ? $kdruang : 'KRG-' . uniqid();
$namaruang      = ($nmruang  != "") ? $nmruang : "";
$detailruang    = ($detruang != "") ? $detruang : "";
$button         = (!empty($_GET['kdubah'])) ? "update" : "submit";
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
    <div class="">
        
        
                 <!-- ------------------------------ -->   
     <form action="?page=control&control=ruangControl" method="post" class="form-group">
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Data Ruang</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Ruang</label>
                                                <input id="cc-kode" 
                                                name="kdruangin"
                                                value="<?php echo $koderuang; ?>" 
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
                                                    value="<?php echo $namaruang;?>" 
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
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="<?php echo $button; ?>">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="">Simpan Data</span>
                                                        
                                                    </button>
                                                </div>
     </form>
                    
        </div>
	</div>
   
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
