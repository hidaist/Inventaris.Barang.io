<?php
error_reporting(0); 
// cek session
include "../cek_login.php";

// cek level untuk akses
if ($_SESSION['level'] != 'admin') {
	header('location:login.php?code=3');
}

include_once "../librari/inc.koneksi.php";

// Query untuk mengambil data dari tabel barang, barang_pinjam, dan barang_kembali
$sql = mysqli_query($koneksi, "
    SELECT 
        barang.kd_barang, 
        barang.no_barang, 
        barang.nm_barang,
        barang.kd_ruang,
        barang.kondisi_barang,
        barang.date_pembelian,
        barang.keterangan_barang,
        barang.filegambar,
        barang.harga_barang,
        barang.anggaran_awal,
        barang.sat,
        barang.stat,
        barang_pinjam.kd_pinjam,
        barang_pinjam.nm_peminjam,
        barang_pinjam.date_pinjam,
        DATE_FORMAT(barang_pinjam.date_pinjam, '%d-%m-%Y') AS format_date_pinjam,
        barang_pinjam.keterangan_pinjam,
        barang_kembali.kd_kembali,
        barang_kembali.date_kembali,
        DATE_FORMAT(barang_kembali.date_kembali, '%d-%m-%Y') AS format_date_kembali
    FROM 
        barang
    INNER JOIN 
        barang_pinjam ON barang.kd_barang = barang_pinjam.kd_barang
    LEFT JOIN 
        barang_kembali ON barang_pinjam.kd_pinjam = barang_kembali.kd_pinjam
");

// Mengambil data hasil query ke dalam array asosiatif
$dataarrayrekap = [];
while($arrayrekapbarang = mysqli_fetch_assoc($sql)) {
    $dataarrayrekap[] = $arrayrekapbarang;
}
?>

<!DOCTYPE html>
<html>
<head> 
    <script src="vendors/scripts/core.js"></script> 
    <script src="vendors/scripts/datatable-setting.js"></script>
</head>
<body>
<?php
// Pesan sukses jika ada
if (isset($_GET['blok1']) && $_GET['blok1'] == 'true') {
    echo '<div class="col-sm-12" id="blok1">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>';
}
?>

<div class="content mt-3 table-responsive">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header" align="center">
                        <strong class="card-title"> Data Rekap Peminjaman & Pengembalian Barang </strong>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nomor Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Tgl Pinjam</th>
                                    <th>Tgl Kembali</th>
                                    <th>Nama Peminjam</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($dataarrayrekap as $datarekap): ?>    
                                    <tr>
                                        <td><?php echo $datarekap['kd_barang']; ?></td>
                                        <td><?php echo $datarekap['no_barang']; ?></td>
                                        <td><?php echo $datarekap['nm_barang']; ?></td>
                                        <td><?php echo $datarekap['format_date_pinjam']; ?></td>
                                        <td class="<?php echo $datarekap['format_date_kembali'] ?: 'alert alert-danger'; ?>" ><?php echo $datarekap['format_date_kembali'] ?: 'Belum Kembali'; ?></td>
                                        <td><?php echo $datarekap['nm_peminjam']; ?></td>
                                        <td><?php echo $datarekap['keterangan_pinjam']; ?></td>
                                        <td>
                                            <a class='fa fa-book' title='Detail Data Barang Yang di Pinjam' href='?page=views&views=barangDetailViews&kddetail=<?php echo $datarekap['kd_barang']; ?>'>
                                                <i class='dw dw-delete-3'></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
