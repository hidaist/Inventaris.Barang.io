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
$sql = mysqli_query($koneksi, "SELECT DATE_FORMAT(date_pembelian, '%M-%Y') AS bulan_tahun,
SUM(harga_barang) AS total_harga_barang
FROM barang
GROUP BY bulan_tahun ORDER BY date_pembelian;
");
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
                                <strong class="card-title"> Laporan Pengeluaran Bulanan &nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body  table-responsive">
                           
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Total Pengeluaran</th>
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
                                    echo "<td>" .$data['bulan_tahun']. "</td>" ;
                                    $harga_barang = $data['total_harga_barang'];
                                    $rupiah = "Rp" . number_format($harga_barang, 0, ',', '.');
                                    echo "<td>" . $rupiah . "</td>";
                                    echo "<td> " ;
                                    echo " <a class='fa fa-book'
                                    title='Detail Laporan Bulan' href='?page=laporanbulandetail&kddetail=$data[bulan_tahun]'>
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
                        </div>
                    </div>
                </div>
            </div>
</div>
</body>

 </html>