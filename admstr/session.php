<?php
session_start();
if (!isset($_SESSION['level']) || $_SESSION['level'] != 'admin') {
    header('location:../login.php?code=3');
    exit();
}
?>
