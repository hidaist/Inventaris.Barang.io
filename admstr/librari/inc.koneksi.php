<?php
$db_host1 = 'localhost';
$db_user1 = 'root';
$db_pass1 = '';
$database1 = 'dbsarpras';
 
$koneksi = new mysqli($db_host1, $db_user1, $db_pass1, $database1);
 
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database  : '.mysqli_connect_error();
}

?>