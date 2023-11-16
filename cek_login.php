<?php
session_start(); 
//mengecek login. kalau eroro masuk ke login.php #code3
if (!isset($_SESSION['username']) AND (!isset($_SESSION['level'])))
{
	header ('location:login.php?code=3');
}
?>
