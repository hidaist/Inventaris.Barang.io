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
// Koneksi ke database
include_once "../librari/inc.koneksi.php"; 

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Lakukan kueri untuk memeriksa apakah email sudah digunakan
    $query = "SELECT COUNT(*) as total FROM users WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];

        if ($total > 0) {
            echo "used"; // Email sudah digunakan
        } else {
            echo "available"; // Email tersedia
        }
    }
}
if (isset($_GET['emailsis'])) {
    $emailsis = $_GET['emailsis'];

    // Lakukan kueri untuk memeriksa apakah username sudah digunakan
    $query_userpend = "SELECT COUNT(*) as total_userpend FROM users_pend WHERE username_pend = '$emailsis'";
    $result_userpend = mysqli_query($koneksi, $query_userpend);

    if ($result_userpend) {
        $row_userpend = mysqli_fetch_assoc($result_userpend);
        $total_userpend = $row_userpend['total_userpend'];

        if ($total_userpend > 0) {
            echo "used"; // Email sudah digunakan
        } else {
            echo "available"; // Email tersedia
        }
    }
}


?>