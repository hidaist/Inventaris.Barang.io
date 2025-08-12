<?php 
error_reporting(0);
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
$sqlbarangRbdet = mysqli_query($koneksi, "SELECT * FROM barang, ruang WHERE barang.kd_ruang=ruang.kd_ruang AND kondisi_barang='RB' ORDER BY kd_barang");


while($arraybarangrbdet = mysqli_fetch_array($sqlbarangRbdet))

    { 
        $dataarraybarangrb[]=$arraybarangrbdet;
    }
   
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
                                <strong class="card-title"> Data Barang Kondisi Baik (B)&nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body table-responsive">
                           
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
                                        <?php foreach($dataarraybarangrb as $datarb): ?>
                                        <?php  
                                            $warna = $datarb['kondisi_barang'];
                                            if($datarb['kondisi_barang']=="B"){
                                                $kon="alert alert-success";
                                            } elseif ($datarb['kondisi_barang']=="RR"){
                                                    $kon="alert alert-primary";
                                            } else $kon="alert alert-danger"; ?>
                                <tr>
                                    <td><?php echo $datarb['kd_barang']; ?></td>
                                    <td><?php echo $datarb['no_barang']; ?></td>
                                    <td><?php echo $datarb['nm_barang']; ?></td>
                                    <td><?php echo $datarb['nm_ruang']; ?></td>
                                    <td> <span class='<?php echo $kon ;?>' title='<?php echo $datarb['kondisi_barang'] == 'B' ? 'Baik' : ($datarb['kondisi_barang'] == 'RR' ? 'Rusak Ringan' : 'Rusak Berat'); ?>'> <?php echo $datarb['kondisi_barang']; ?></span></td>
                                    <td>
                                    <a class='ti-book'
                                                 title='Edit data barang <?php echo $datarb['nm_barang']; ?> di  <?php echo $datarb['nm_ruang']; ?> ' href='?page=forms&forms=barangForms&kdubah=<?php echo $datarb['kd_barang']; ?>'
                                                    > Edit</a
                                                >
                                                <a class='fa fa-trash-o'  
                                                 title='Hapus Data Barang <?php echo $datarb['nm_barang']; ?> di  <?php echo $datarb['nm_ruang']; ?>' href='?page=control&control=barangControl&kdhapus=<?php echo $datarb['kd_barang']; ?>'
                                                 onclick='return confirm("Beneran Mau di Hapus.?")' 
                                                    ><i class='dw dw-delete-3'></i> Delete</a
                                                >
                                                <a class='fa fa-book'  
                                                 title='Detail Barang <?php echo $datarb['nm_barang']; ?> di  <?php echo $datarb['nm_ruang']; ?>' href='?page=views&views=barangDetailViews&kddetail=<?php echo $datarb['kd_barang']; ?>'>
                                                 <i class='dw dw-delete-3'></i> Detail</a
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