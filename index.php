<?php

// cek session
// cek session sangat penting untuk USER yang ingin masuk/login tanpa proses login.
/*
	-Sesion Level admin  = mengirim data ke folder admstr
	-Sesion Level petugas = mengirim data ke folder admtch
	-Sesion Level operator = belum ada. bisa dikembangkan. dihapus juga boleh.

	include "cek_login.php" = memanggil file cek_login.php untuk mengetahui apakah data username password sama atau tidak
*/
include "cek_login.php";

if ($_SESSION['level']=='admin') {
	header('location:admstr/index.php');
}

elseif ($_SESSION['level']=='petugas') {
	header('');
}

elseif ($_SESSION['level']=='administrator') {
	header('');
}

else { header('location: login.php'); }

?>
