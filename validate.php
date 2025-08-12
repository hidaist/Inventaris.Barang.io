<?php
// error_reporting(0);

//koneksi ke database
include "librari/inc.koneksi.php";
include "fungsi_injection.php";

$username = antiinjection($_POST['username']);
$password = antiinjection(md5($_POST['password']));
$level = antiinjection($_POST['level']);


// query untuk mendapatkan record dari username di table 
$query = mysqli_query($koneksi,"SELECT * FROM admin WHERE username ='$username' AND password ='$password' AND level ='$level'  ");
/*if (!$query) {
    die("Query error: " . mysqli_error($koneksi));
} */
$data = mysqli_fetch_array ($query);

// cek kesesuian password tb_guru
if (($password== $data['password']) AND ($username==$data['username']) AND ($level==$data['level']))
	{
	// echo "<h1>Login Sukses</h1><p>";
	
	// menyimpan username kedalam SESSION
	session_start();
	$_SESSION['username'] 		= $data['username'];
	$_SESSION['level'] 			= $data['level'];
	$_SESSION['jk'] 			= $data['jk'];
	$_SESSION['file_gambar'] 	= $data['file_gambar'];
	$_SESSION['attemp']			= $data['attemp'];
	
	
	header('location:index.php');
	}

// username and password salah
else
	{
	header('location:login.php?code=1');
	}

?>



