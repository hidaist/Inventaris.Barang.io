<?php
$db_host1 = 'localhost'; //ganti sesuai host
$db_user1 = 'root'; // ganti sesuai user
$db_pass1 = ''; // password user
$database1 = 'db_inv'; // database 
 
$koneksi = new mysqli($db_host1, $db_user1, $db_pass1, $database1);
 
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database  : '.mysqli_connect_error();
}

?>  