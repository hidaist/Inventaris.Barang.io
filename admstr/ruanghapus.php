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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<!-- penghapusan data  -->
<?php

if (! $_GET['kdhapus']=="") {
        include_once "../librari/inc.koneksi.php";
        $sql = " DELETE FROM ruang
                         WHERE kd_ruang ='".$_GET['kdhapus']."'";
        mysqli_query($koneksi, $sql)
                  or die ("Gagal query hapus".mysqli_error($koneksi));

        echo '<div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>';
        include "ruangtampil.php";
}
else {
        include "ruangtampil.php";
        exit;
}
?>


</body>
</html>
