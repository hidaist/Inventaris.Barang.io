<?php
error_reporting(0); 
// cek session
// cek session sangat penting untuk USER yang ingin masuk/login tanpa proses login.
//include "../cek_login.php";
//cek level
if ($_SESSION['level'] != 'admin') // hanya level admin yang boleh masuk
{
	header ('location:login.php?code=3');
}
?>
<?php include_once "../librari/inc.koneksi.php";
if (! $_GET['kddetail']=="") {
    $sql  = "SELECT * FROM barang, ruang Where ruang.kd_ruang=barang.kd_ruang AND kd_barang='".$_GET['kddetail']."'";
//       echo"$sql";
    $qry  = mysqli_query($koneksi, $sql) or die ("Gagal sql");
    $data = mysqli_fetch_array($qry);
    
            $kdbarang = $data['kd_barang'];
            $nobarang = $data['no_barang'];
            $nmbarang = $data['nm_barang'];
            $kdruang  = $data['kd_ruang'];
            $nmruang  = $data['nm_ruang'];
            $kondisi  = $data['kondisi_barang'];
            $keterangan = $data['keterangan_barang'];
            $filegambar = $data['filegambar'];
            $pembelian = $data['date_pembelian'];
            $hrbarang = $data['harga_barang'];
            $danaawal = $data['anggaran_awal'];
            $merk = $data['merk'];
            $bahan = $data['bahan'];
            $type = $data['type'];
    
}
 ?>
<html>
<head> 
<style>
    .fit-image {
        width: 180px;
        height: 180px;
        object-fit: cover;
    }
</style>
<link rel="stylesheet" href="lightbox/dist/css/lightbox.min.css">

</head>

<body> <center>
<div class="col-md-6" align="center">
                        <div class="card">
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                <a href="../image/<?php echo $filegambar;?>" data-lightbox="example-set" data-title="<?php echo $nmbarang; echo'<br>';echo $keterangan;?>"> 
                                <img class="rounded-circle mx-auto d-block fit-image zoom-image"  src="../image/<?php echo $filegambar;?>" alt="Card image cap"> </a>
                                    <h5 class="text-sm-center mt-2 mb-1" title="Nama Barang"><?php echo $nmbarang ; ?></h5>
                                    <font class="text-sm-center mt-2 mb-1" title="Merk"><?php echo $merk ; ?></font>
                                    <font class="text-sm-center mt-2 mb-1" title="Type"><?php echo $type ; ?></font><br>
                                    <div class="fa fa-key text-sm-center" title="Kode Unik Barang"> <?php echo $kdbarang ; ?></div>
                                   <br><div class="fa fa-book text-sm-center" title="No Barang"> <?php echo $nobarang ; ?></div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                <h4 class="card-title mb-3 fa fa-map text-sm-center" title="Lokasi Ruang"> <b> <?php echo $nmruang; ?> </b></h4>
                                </div>
                            </div>
                            <div class="typo-articles">
                                <?php echo nl2br(htmlspecialchars($keterangan)); ?>
                            </div>
                            <div class="typo-articles">
                                Awal Pembelian <?php $tanggal_format = date('d-M-Y', strtotime($pembelian)); echo $tanggal_format ?> harga  <?php $harga_rupiah = "Rp" . number_format($hrbarang, 0, ',', '.'); echo $harga_rupiah;?>
                            </div>
                            <div class="typo-articles">
                                Kondisi <?php if($kondisi=='B'){echo"Baik";} elseif ($kondisi=='RR'){echo"Rusak Ringan";} else echo"Rusak Berat";  ?>
                            </div>
                            <div class="typo-articles">
                            <?php
                                $data_pembelian = new DateTime($data['date_pembelian']);
                                $sekarang = new DateTime(); // Waktu saat ini
                                $selisih = $sekarang->diff($data_pembelian);
                                $selisih_tahun = $selisih->y;
                                $selisih_bulan = $selisih->m;

                                echo "Umur: " . $selisih_tahun . " tahun, " . $selisih_bulan . " bulan.";
                                echo " Anggaran: " . $data['anggaran_awal'];
                                ?>

                            </div>
                            <div class="card-footer">
                                <strong class="card-title mb-3"><a  class="btn btn-success fa fa-book " title="Edit Data Barang" href="?page=forms&forms=barangForms&kdubah=<?php echo $data['kd_barang']; ?>"> Edit Data Barang</a>    
                                <a  class="btn btn-danger fa fa-trash " title="Hapus Data Barang" href="?page=control&control=barangControl&kdhapus=<?php echo $data['kd_barang']; ?>" onclick="return confirm('Beneran Mau di Hapus.?')"> Delete Data Barang</a></strong>
                            </div>
                            <div class="card-footer">
                                <strong class="card-title mb-3"><a  class="btn  fa fa-arrow-left " title="Back" href="javascript:window.history.back();"> Back</a>    
                                </strong>
                            </div>
                        </div>
                    </div>
                    </center>
                    <script src="lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
                    <script>
                    lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true
                    })
</script>
</body>
</html>