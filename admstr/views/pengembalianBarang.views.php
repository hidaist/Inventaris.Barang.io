<?php 
error_reporting(0);
// cek session
// cek session sangat penting untuk USER yang ingin masuk/login tanpa proses login.
include "../cek_login.php";
//cek level
if ($_SESSION['level'] != 'admin') // hanya level admin yang boleh masuk
{
	header ('location:login.php?code=3');
}
?>
<?php include_once "../librari/inc.koneksi.php";
$sql = mysqli_query($koneksi, "SELECT barang.*, barang_pinjam.*
FROM barang_pinjam
LEFT JOIN barang ON barang_pinjam.kd_barang = barang.kd_barang
LEFT JOIN barang_kembali ON barang_pinjam.kd_pinjam = barang_kembali.kd_pinjam
WHERE barang_kembali.kd_pinjam IS NULL");

while ($arraypinjambarang= mysqli_fetch_array($sql)){
    $dataarraypinjambarang[]=$arraypinjambarang;
}
 ?>
 
 <html>
<head> 
    <script src="vendors/scripts/core.js"></script> 
        <script src="vendors/scripts/core.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>
</head>

<body>
<?php
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
                                <strong class="card-title"> Data Barang Yang Belum di Kembalikan &nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body  table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Pinjam</th>
                                            <th>Nomor Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Tgl Pinjam</th>
                                            <th>Nama Peminjam</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($dataarraypinjambarang as $data ): ?>
                                <tr>
                                    <td><?php echo $data['kd_pinjam']; ?></td>
                                    <td><?php echo $data['no_barang']; ?></td>
                                    <td><?php echo $data['nm_barang']; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($data['date_pinjam'])); ?></td>
                                    <td><?php echo $data['nm_peminjam']; ?></td>
                                    <td><?php echo $data['keterangan_pinjam'];?></td>
                                    <td>
                                    <!-- <a class='ti-book' 
                                                 title='Edit data pinjam barang' href='?page=barangpinjamedit&kdubah=$data[kd_pinjam]'
                                                    > Edit</a
                                                > -->
                                                
                                                <a class='fa fa-book'  
                                                 title='Detail Data Barang Yang di Pinjam <?php echo $data['nm_peminjam'] ?>' href='?page=views&views=barangDetailViews&kddetail=<?php echo $data['kd_barang']; ?>'>
                                                 <i class='dw dw-delete-3'></i> Detail</a
                                                >
                                                <a class='fa fa-exchange'  
                                                 title='Proses Pengembalian Barang' href='?page=forms&forms=barangKembaliForms&kdkembali=<?php echo $data['kd_pinjam']; ?>'>
                                                 <i class='dw dw-delete-3'></i> Pengembalian Barang</a
                                                >
                                          
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