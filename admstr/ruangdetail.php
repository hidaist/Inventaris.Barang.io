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
include_once "../librari/inc.koneksi.php";
if (!$_GET['kddetail']=="") {
    $sql  = "SELECT * FROM barang, ruang WHERE barang.kd_ruang=ruang.kd_ruang AND ruang.kd_ruang='".$_GET['kddetail']."'";
    //echo "$sql";
    $qry  = mysqli_query($koneksi, $sql) or die ("Gagal sql");
   // mysqli_num_rows($qry)  ;
    $data = mysqli_fetch_array($qry);
    $kdruang = $data['kd_ruang'];
    $nmruang  = $data['nm_ruang'];
        
    
            
}
?>
    
<html>
<head> 

</head>

<body>
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" align="center">
                                <strong class="card-title"> Data Inventaris Barang di  <?php echo $nmruang; ?> &nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body table-responsive">
                            
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Kondisi</th>
                                            <th>Detail Barang</th>
                                            <th>Harga Barang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php include_once "../librari/inc.koneksi.php"; 
                                    $sql = mysqli_query($koneksi, "SELECT * FROM barang, ruang WHERE barang.kd_ruang=ruang.kd_ruang AND ruang.kd_ruang='".$_GET['kddetail']."'");

?>
                                   <?php 
                                   //mysqli_data_seek($qry, 0);
                                   while($data = mysqli_fetch_array($sql)) {
                                        $warna = $data['kondisi_barang'];
                                        if($data['kondisi_barang']=="B"){
                                             $kon="alert alert-success";
                                        } elseif ($data['kondisi_barang']=="RR"){
                                             $kon="alert alert-primary";
                                        } else $kon="alert alert-danger";
                                    echo "<tr>" ;
                                    echo "<td>" .$data['no_barang']. "</td>" ;
                                    echo "<td>" .$data['nm_barang']. "</td>" ;
                                    echo "<td> <span class='$kon' title='" . ($data['kondisi_barang'] == 'B' ? 'Baik' : ($data['kondisi_barang'] == 'RR' ? 'Rusak Ringan' : 'Rusak Berat')) . "'>" .$data['kondisi_barang']. "</span> </td>" ;
                                    echo "<td>" .$data['keterangan_barang']. "</td>" ;
                                    $harga_barang = $data['harga_barang'];
                                    $harga_rupiah = "Rp" . number_format($harga_barang, 0, ',', '.');
                                    echo "<td>" . $harga_rupiah . "</td>";
                                    echo "<td> " ;
                                    echo " <a class='fa fa-edit' 
                                                 title='Edit data ruang' href='?page=editbarang&kdubah=$data[kd_barang]'
                                                    > Edit</a
                                                >
                                                <a class='fa fa-trash-o'  
                                                 title='Hapus Data Ruang' href='?page=hapusbarang&kdhapus=$data[kd_barang]'
                                                 onclick='return confirm(\"Beneran Mau di Hapus.?\")' 
                                                    ><i class='dw dw-delete-3'></i> Delete</a
                                                >
                                                <a class='fa fa-book'  
                                                 title='Detail Data Barang' href='?page=detailbarang&kddetail=$data[kd_barang]'>
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
                                    $query_jumlah_total = mysqli_query($koneksi, "SELECT SUM(harga_barang) as jumlah_total FROM barang WHERE kd_ruang = '$kdruang'");
                                    $jumlah_total = mysqli_fetch_array($query_jumlah_total)['jumlah_total'];
                                    $harga_barang = $jumlah_total;

                                    // Format angka sebagai Rupiah
                                    $harga_rupiah = "Rp " . number_format($harga_barang, 0, ',', '.');
                                    echo "Total Jml Asset $nmruang= $harga_rupiah";
                                    ?>
                                </div>
                            </div>
                            <div class="card-footer" align="center" >
                                <strong class="card-title mb-3"><a  class="btn  fa fa-arrow-left " title="Back" href="javascript:window.history.back();"> Back</a>    
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
</body>
</html>