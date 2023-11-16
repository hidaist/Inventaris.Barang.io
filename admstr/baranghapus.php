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

if (!empty($_GET['kdhapus'])) {
    include_once "../librari/inc.koneksi.php";
    
    // Ambil nama file gambar yang akan dihapus
    $sql = "SELECT filegambar FROM barang WHERE kd_barang='".$_GET['kdhapus']."'";
    $qry = mysqli_query($koneksi, $sql) or die("Gagal sql");
    $data = mysqli_fetch_array($qry);
    $filegambar = $data['filegambar'];
    
    // Hapus file gambar jika ada
    if (!empty($filegambar)) {
        $path = __DIR__ . "/image/" . $filegambar;
        if (file_exists($path)) {
            unlink($path);
        }
    }
    
    // Hapus data dari tabel
    $sql = "DELETE FROM barang WHERE kd_barang='".$_GET['kdhapus']."'";
    mysqli_query($koneksi, $sql) or die("Gagal query hapus".mysqli_error($koneksi));
    
    echo '<div class="col-sm-12">
    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-danger">Success</span> You successfully read this important alert message.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>';
    include "barangtampil.php";
} else {
    include "barangtampil.php";
    exit;
}

?>
