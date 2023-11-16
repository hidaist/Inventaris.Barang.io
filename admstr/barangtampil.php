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
$sql = mysqli_query($koneksi, "SELECT * FROM barang, ruang WHERE barang.kd_ruang=ruang.kd_ruang ORDER BY kd_barang");
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
                <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#largeModal">
                            Tambah Data Barang
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
                                
                            <?php include_once "barangtambah.php"; ?>
                            
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
                                <strong class="card-title"> Data Barang &nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body">
                           
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Nomor Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Letak Barang</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Umur Barang</th>
                                            <th>Dana</th>
                                            <th>Hr Beli</th>
                                            <th>Kondisi</th>
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
                                    echo "<td>" .$data['nm_ruang']. "</td>" ;
                                    echo "<td>" . date('d-m-Y', strtotime($data['date_pembelian'])). "</td>" ;
                                    $data_pembelian = new DateTime($data['date_pembelian']);
                                    $sekarang = new DateTime(); 
                                    $selisih = $sekarang->diff($data_pembelian);
                                    $selisih_tahun = $selisih->y;
                                    $selisih_bulan = $selisih->m;
                                    echo "<td>" . $selisih_tahun . "," . $selisih_bulan . "Bulan</td>";
                                    echo "<td>" .$data['anggaran_awal']. "</td>" ;
                                    $harga_barang = $data['harga_barang'];
                                    $harga_rupiah = "Rp" . number_format($harga_barang, 0, ',', '.');
                                    echo "<td>" . $harga_rupiah . "</td>";
                                    echo "<td><span class='$kon' title='" . ($data['kondisi_barang'] == 'B' ? 'Baik' : ($data['kondisi_barang'] == 'RR' ? 'Rusak Ringan' : 'Rusak Berat')) . "'>" . $data['kondisi_barang'] . "</span></td>";
                                    echo "<td> " ;
                                    echo " <a class='ti-book' 
                                                 title='Edit data ruang' href='?page=editbarang&kdubah=$data[kd_barang]'
                                                    > Edit</a
                                                >
                                                <a class='fa fa-trash-o'  
                                                 title='Hapus Data Barang' href='?page=hapusbarang&kdhapus=$data[kd_barang]'
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
                          
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
</body>

 </html>