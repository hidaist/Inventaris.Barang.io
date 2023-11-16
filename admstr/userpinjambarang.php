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
<?php include_once "../librari/inc.koneksi.php";
$sql = mysqli_query($koneksi, "SELECT barang.*, barang_pinjam.*
FROM barang_pinjam
LEFT JOIN barang ON barang_pinjam.kd_barang = barang.kd_barang
LEFT JOIN barang_kembali ON barang_pinjam.kd_pinjam = barang_kembali.kd_pinjam
WHERE barang_kembali.kd_pinjam IS NULL");
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
                                <strong class="card-title"> Data Barang Yang di Pinjam&nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body table-responsive">
                            <a  class="btn btn-success fa fa-book" title="Tambah Barang" href="?page=barangpinjamtambah"> Tambah Data Pinjam Barang</a>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Nomor Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Tgl Pinjam</th>
                                            <th>Nama Peminjam</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($data = mysqli_fetch_array($sql)) {
                                        $warna = $data['kondisi_barang'];
                                        if($data['kondisi_barang']=="B"){
                                             $kon="alert alert-success";
                                        } elseif ($data['kondisi_barang']=="RR"){
                                             $kon="alert alert-primary";
                                        } else $kon="alert alert-danger";
                                        
                                echo "<tr>" ;
                                    
                                    echo "<td>" .$data['kd_barang']. "</td>" ;
                                    echo "<td>" .$data['no_barang']. "</td>" ;
                                    echo "<td>" .$data['nm_barang']. "</td>" ;
                                    echo "<td>" . date('d-m-Y', strtotime($data['date_pinjam'])). "</td>" ;
                                    echo "<td>" .$data['nm_peminjam']. "</td>" ;
                                    echo "<td>" .$data['keterangan_pinjam']. "</td>" ;
                                    echo "<td> " ;
                                    echo " <a class='ti-book' 
                                                 title='Edit data pinjam barang' href='?page=barangpinjamedit&kdubah=$data[kd_pinjam]'
                                                    > Edit</a
                                                >
                                                <a class='fa fa-trash-o'  
                                                 title='Hapus Data Pinjam Barang' href='?page=barangpinjamhapus&kdhapus=$data[kd_pinjam]'
                                                 onclick='return confirm(\"Beneran Mau di Hapus.?\")' 
                                                    ><i class='dw dw-delete-3'></i> Delete</a
                                                >
                                                <a class='fa fa-book'  
                                                 title='Detail Data Barang Yang di Pinjam' href='?page=detailbarang&kddetail=$data[kd_barang]'>
                                                 <i class='dw dw-delete-3'></i> Detail</a
                                                >
                                                <a class='fa fa-exchange'  
                                                 title='Pengembalian Barang' href='?page=barangkembali&kdkembali=$data[kd_pinjam]'>
                                                 <i class='dw dw-delete-3'></i> Pengembalian Barang</a
                                                >
                                          " ;
                                    echo "</td>" ;
                                echo "</tr>" ;
                            }?>
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