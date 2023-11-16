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
$sql = mysqli_query($koneksi, "SELECT * FROM barang, ruang WHERE barang.kd_ruang=ruang.kd_ruang AND kondisi_barang='RB' ORDER BY kd_barang");
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
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" align="center">
                                <strong class="card-title"> Data Barang &nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body table-responsive">
                            <a  class="btn btn-success fa fa-book " title="Tambah Barang" href="?page=tambahbarang"> Tambah Data Barang</a>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Nomor Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Letak Barang</th>
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
                                    echo "<td> <span class='$kon' title='" . ($data['kondisi_barang'] == 'B' ? 'Baik' : ($data['kondisi_barang'] == 'RR' ? 'Rusak Ringan' : 'Rusak Berat')) . "'>" .$data['kondisi_barang']. "</span></td>" ;
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