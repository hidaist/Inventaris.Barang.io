<?php 
error_reporting(0);
// cek session
// cek session sangat penting untuk USER yang ingin masuk/login tanpa proses login.
include "../../cek_login.php";
//cek level
if ($_SESSION['level'] != 'admin') // hanya level admin yang boleh masuk
{
	header ('location:login.php?code=3');
}
?>
<?php include_once "../librari/inc.koneksi.php";
$sqlpinjambarang = mysqli_query($koneksi, "SELECT barang.*, barang_pinjam.*
FROM barang_pinjam, barang
WHERE barang_pinjam.kd_barang=barang.kd_barang ");

while($datasqlpinjambarang = mysqli_fetch_array($sqlpinjambarang)){
    $arraypinjambarang[] = $datasqlpinjambarang;
   
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
               
<div class="content mt-3">
            <div class="animated">
                <div class="row">
                <button type="button" class="btn-sm btn-success mb-1" data-toggle="modal" data-target="#largeModal">
                Tambah Data Pinjam Barang
                        </button>
                        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document"> 
                        <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="largeModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body  table-responsive">
                                        
                                    <?php include_once "forms/pinjamBarang.forms.php"; ?>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-12  animated fadeIn">
                        <div class="card">
                            <div class="card-header" align="center">
                                <strong class="card-title"> Rekap Data Peminjam Barang&nbsp;&nbsp;&nbsp; </strong>
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
                
                                    <?php foreach($arraypinjambarang as $dataarraypinjambarang): 
                                         $warna = $dataarraypinjambarang['kondisi_barang'];
                                         if($dataarraypinjambarang['kondisi_barang']=="B"){
                                              $kon="alert alert-success";
                                         } elseif ($dataarraypinjambarang['kondisi_barang']=="RR"){
                                              $kon="alert alert-primary";
                                         } else $kon="alert alert-danger"; ?>    
                                <tr>
                                    <td><?php echo $dataarraypinjambarang['kd_pinjam']; ?></td>
                                    <td><?php echo $dataarraypinjambarang['no_barang']; ?></td>
                                    <td><?php echo $dataarraypinjambarang['nm_barang']; ?></td>
                                    <td> <?php echo date('d-m-Y', strtotime($dataarraypinjambarang['date_pinjam'])) ?></td>
                                    <td> <?php echo $dataarraypinjambarang['nm_peminjam']; ?></td>
                                    <td><?php echo $dataarraypinjambarang['keterangan_pinjam']; ?></td>
                                    <td>

                                                
                                                <a class='fa fa-book'  
                                                 title='Detail  Barang Yang di Pinjam <?php echo $dataarraypinjambarang['nm_peminjam']; ?>'  href='?page=views&views=barangDetailViews&kddetail=<?php echo $dataarraypinjambarang['kd_barang'] ;?>'>
                                                 <i class='dw dw-delete-3'></i> Detail</a
                                                >
                                    </td>
                                </tr>
                                <?php endforeach ?>
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