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
$sql = mysqli_query($koneksi, "SELECT * FROM ruang ORDER BY kd_ruang");
 ?>
 
 <html>
<head> 

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
                <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#largeModal">
                            Tambah Data Ruang
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
                            <div class="modal-body">
                                
                            <?php include_once "ruangtambah.php"; ?>
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" align="center">
                                <strong class="card-title"> Data Ruang &nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body table-responsive">
                            
                                  <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Ruang</th>
                                            <th>Nama Ruang</th>
                                            <th>Detail Ruang</th>
                                            <th>Banyak Asset</th>
                                            <th>Total Hr Asset</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($data = mysqli_fetch_array($sql)) {
								
                                echo "<tr>" ;
                                    
                                    
                                    
                                    echo "<td>" .$data['kd_ruang']. "</td>" ;
                                    
                                    echo "<td>" .$data['nm_ruang']. "</td>" ;
                                    
                                    echo "<td>" .$data['detail_ruang']. "</td>" ;
                                    
                                    $query_jumlah_barang = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah_barang FROM barang WHERE kd_ruang = '".$data['kd_ruang']."'");
                                    $jumlah_barang = mysqli_fetch_array($query_jumlah_barang)['jumlah_barang'];
                                    
                                    echo "<td>" .$jumlah_barang. "</td>" ;

                                    $query_jumlah_total = mysqli_query($koneksi, "SELECT SUM(harga_barang) as jumlah_total FROM barang WHERE kd_ruang = '".$data['kd_ruang']."'");
                                    $jumlah_total = mysqli_fetch_array($query_jumlah_total)['jumlah_total'];
                                    $harga_barang = $jumlah_total;

                                    // Format angka sebagai Rupiah
                                    $harga_rupiah = "Rp " . number_format($harga_barang, 0, ',', '.');
                                    echo "<td>" . $harga_rupiah . "</td>";
                                    echo "<td> " ;
                                    echo " <a class='fa fa-edit'  data-toggle='modal' data-target='#mediumModal' 
                                                 title='Edit data ruang' href='?page=editruang&kdubah=$data[kd_ruang]'
                                                    > Edit</a
                                                >
                                                <a class='fa fa-trash-o'  
                                                 title='Hapus Data Ruang' href='?page=hapusruang&kdhapus=$data[kd_ruang]'
                                                 onclick='return confirm(\"Beneran Mau di Hapus.?\")' 
                                                    ><i class='dw dw-delete-3'></i> Delete</a
                                                >
                                                <a class='fa fa-book'
                                                 title='Detail Data Barang' href='?page=detailruang&kddetail=$data[kd_ruang]'>
                                                 <i class='dw dw-delete-3'></i> Detail</a
                                                >
                                          " ;
                                    echo "</td>" ;
                                echo "</tr>" ;
                            }?>
                            </tbody>
                        </table>
                        
                        <div>
                                    <?php  
                                    $query_jumlah_total = mysqli_query($koneksi, "SELECT SUM(harga_barang) as jumlah_total FROM barang");
                                    $jumlah_total = mysqli_fetch_array($query_jumlah_total)['jumlah_total'];
                                    $harga_barang = $jumlah_total;

                                    // Format angka sebagai Rupiah
                                    $harga_rupiah = "Rp " . number_format($harga_barang, 0, ',', '.');
                                    echo "Total Jml Asset $nmruang= $harga_rupiah";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

</body>

 </html>