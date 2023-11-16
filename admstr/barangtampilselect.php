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
// Sambungkan ke database atau lakukan operasi yang diperlukan
include_once "../librari/inc.koneksi.php";

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Query untuk mendapatkan data ruang
$sql = "SELECT * FROM barang ORDER BY kd_barang";
$result = mysqli_query($koneksi, $sql);

// Inisialisasi array untuk menyimpan data
$data_barang = array();

// Loop melalui hasil query dan tambahkan ke array
while ($row = mysqli_fetch_assoc($result)) {
    $data_barang[] = $row;
}

// Tutup koneksi
mysqli_close($koneksi);

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data_barang);
?>
