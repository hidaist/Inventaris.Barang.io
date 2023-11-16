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
if (! $_GET['kddetail']=="") {
$sql = mysqli_query($koneksi, "SELECT *
FROM barang
WHERE DATE_FORMAT(date_pembelian, '%M-%Y') ='".$_GET['kddetail']."'");
// $qry  = mysqli_query($koneksi, $sql) or die ("Gagal sql");
$bulantahun = $_GET['kddetail'];

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
                <?php /* -----------Depresiasi---------------
                function calculateDepreciation($originalValue, $age) {
                    if ($age >= 1 && $age <= 10) {
                        $depreciationRate = 0.10; // 10% depreciation per year
                    } elseif ($age >= 11 && $age <= 20) {
                        $depreciationRate = 0.20; // 20% depreciation per year
                    } elseif ($age >= 21 && $age <= 30) {
                        $depreciationRate = 0.30; // 30% depreciation per year
                    } else {
                        $depreciationRate = 0.50; // 50% depreciation per year for age > 30
                    }
                
                    // jumlah depreciatedvalue
                    $depreciatedValue = $originalValue * pow(1 - $depreciationRate, $age);
                
                    return $depreciatedValue;
                }
                
                
                $originalValue = 1000; 
                $age = 5; 
                $depreciatedValue = calculateDepreciation($originalValue, $age);
                 */ ?>
<div class="content mt-3 table-responsive">
            <div class="animated">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" align="center">
                                <strong class="card-title"> Laporan Pengeluaran Bulan <?php echo $_GET['kddetail']; ?> &nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body  table-responsive">
                           
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Harga Barang</th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no=0;
                                    $query = mysqli_num_rows($sql);
                                    while($data = mysqli_fetch_array($sql)) {
                                        $warna = $data['kondisi_barang'];
                                        if($data['kondisi_barang']=="B"){
                                             $kon="alert alert-success";
                                        } elseif ($data['kondisi_barang']=="RR"){
                                             $kon="alert alert-primary";
                                        } else $kon="alert alert-danger";
                                        $no++;
                                echo "<tr>" ;
                                    
                                    echo "<td>" .$no. "</td>" ;
                                    echo "<td>" .$data['nm_barang']. "</td>" ;
                                    $harga_barang = $data['harga_barang'];
                                    $rupiah = "Rp" . number_format($harga_barang, 0, ',', '.');
                                    echo "<td>" . $rupiah . "</td>";
                                    echo "<td> " ;
                                    echo " <a class='fa fa-book'  
                                    title='Detail Data Barang' href='?page=detailbarang&kddetail=$data[kd_barang]'>
                                    <i class='dw dw-delete-3'></i> Detail</a
                                   >
                                          " ;
                                    echo "</td>" ;
                                   
                       echo "</td>" ;
                                    echo "</tr>" ;
                            }?>
                            </tbody>
                        </table>
                          
                            </div>
                            <?php  
                                    $query_jumlah_total = mysqli_query($koneksi, "SELECT SUM(harga_barang) as jumlah_total FROM barang WHERE DATE_FORMAT(date_pembelian, '%M-%Y') ='".$_GET['kddetail']."'");
                                    $jumlah_total = mysqli_fetch_array($query_jumlah_total)['jumlah_total'];
                                    $harga_barang = $jumlah_total;

                                    // Format angka sebagai Rupiah
                                    $harga_rupiah = "Rp " . number_format($harga_barang, 0, ',', '.');
                                    echo "Total Jml Pengeluaran Bulan $bulantahun= $harga_rupiah";
                                    ?>
                                    <div class="card-footer" align="center">
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