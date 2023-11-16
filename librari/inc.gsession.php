<?php
session_start();
if(! ((session_is_registered(SES_USER)) && (session_is_registered(SES_PASS)))) {
	echo "<div align=center><b> Perhatian! </b><br>";
	echo "Akses ditolak, Anda belum Login </div>";
	include "../apanel/index.php";
	exit;
}
?>