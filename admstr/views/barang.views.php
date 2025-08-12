<?php 
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
$sqlbarang = mysqli_query($koneksi, "SELECT * FROM barang, ruang WHERE barang.kd_ruang=ruang.kd_ruang ORDER BY kd_barang");

while($arraybarang=mysqli_fetch_array($sqlbarang)){
$dataarraybarang[]=$arraybarang;
$nobarang=1;
}
 ?>
 
 <html>
<head> 
    <script src="vendors/scripts/core.js"></script> 
        <script src="vendors/scripts/core.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>
        <script src="vendors/jquery/src/jquery.js"></script>
        <script src="vendors/bootstrap/dist/bootstrap.js"></script>
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
                <button type="button" class="btn-sm btn-success mb-1" data-toggle="modal" data-target="#largeModal">
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
                                
                            <?php include_once "forms/barang.forms.php"; ?>
                            
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
                           
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Kode Barang</th>
                                            <th>Nomor Barang</th>
                                            <th>Merk</th>
                                            <th>Type</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Sumber</th>
                                            <th>Kondisi</th>
                                            <th>Letak Barang</th>
                                            <th>Umur Barang</th>
                                            <th>Hr Beli</th>
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($dataarraybarang as $databarang): ?>
                                         <?php  
                                            $warna = $databarang['kondisi_barang'];
                                            if($databarang['kondisi_barang']=="B"){
                                                $kon="alert alert-success";
                                            } elseif ($databarang['kondisi_barang']=="RR"){
                                                    $kon="alert alert-primary";
                                            } else $kon="alert alert-danger"; ?>
                                        <tr>
                                        <td><?php echo $nobarang ++;?></td>
                                        <td><?php echo $databarang['nm_barang'];?></td>
                                        <td><?php echo $databarang['kd_barang'];?></td>
                                        <td><?php echo $databarang['no_barang'];?></td>
                                        <td><?php echo $databarang['merk'];?></td>
                                        <td><?php echo $databarang['type'];?></td>
                                        <td><?php echo $databarang['date_pembelian'];?></td>
                                        <td><?php echo $databarang['anggaran_awal'];?></td>
                                        <td class='<?php echo $kon ;?>' ><?php echo $databarang['kondisi_barang'] == 'B' ? 'Baik' : ($databarang['kondisi_barang'] == 'RR' ? 'Rusak Ringan' : 'Rusak Berat'); ?></td>
                                        <td><?php echo $databarang['nm_ruang'];?></td>       
                                               <?php
                                                $data_pembelian = new DateTime($databarang['date_pembelian']);
                                                $sekarang = new DateTime(); 
                                                $selisih = $sekarang->diff($data_pembelian);
                                                $selisih_tahun = $selisih->y;
                                                $selisih_bulan = $selisih->m;
                                                echo "<td>" . $selisih_tahun . "," . $selisih_bulan . "Bulan</td>";
                                                ?>
                                        
                                                <?php
                                                $harga_barang = $databarang['harga_barang']; // Mengganti $data menjadi $databarang
                                                $harga_rupiah = "Rp" . number_format($harga_barang, 0, ',', '.');
                                                echo "<td>" . $harga_rupiah . "</td>";
                                                ?>
                                       
                                        <td><?php echo $databarang['sat'];?></td>
                                        
                                        <td><a class='ti-book'
                                                 title='Edit data barang <?php echo $databarang['nm_barang']; ?> di  <?php echo $databarang['nm_ruang']; ?> ' href='?page=forms&forms=barangForms&kdubah=<?php echo $databarang['kd_barang']; ?>'
                                                    > Edit</a
                                                >
                                                <a class='fa fa-trash-o'  
                                                 title='Hapus Data Barang <?php echo $databarang['nm_barang']; ?> di  <?php echo $databarang['nm_ruang']; ?>' href='?page=control&control=barangControl&kdhapus=<?php echo $databarang['kd_barang']; ?>'
                                                 onclick='return confirm("Beneran Mau di Hapus.?")' 
                                                    ><i class='dw dw-delete-3'></i> Delete</a
                                                >
                                                <a class='fa fa-book'  
                                                 title='Detail Barang <?php echo $databarang['nm_barang']; ?> di  <?php echo $databarang['nm_ruang']; ?>' href='?page=views&views=barangDetailViews&kddetail=<?php echo $databarang['kd_barang']; ?>'>
                                                 <i class='dw dw-delete-3'></i> Detail</a
                                                ></td>
                                                </tr>
                                    <?php endforeach ;?>    
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
 