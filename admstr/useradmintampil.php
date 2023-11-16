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
$sql = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY username");
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
                            Tambah Data User Admin/Petugas
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
                                    <div class="modal-body table-responsive">
                                        
                                    <?php include_once "useradmintambah.php"; ?>
                                    
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
                                <strong class="card-title"> Data Admin &nbsp;&nbsp;&nbsp; </strong>
                            </div>
                            <div class="card-body table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>kode Admin</th>
                                            <th>User Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($data = mysqli_fetch_array($sql)) {
								
                                echo "<tr>" ;
                                    
                                    
                                    echo "<td>" .$data['kode_admin']. "</td>" ;
                                    echo "<td>" .$data['username']. "</td>" ;
                                    echo "<td> " ;
                                    echo " <a class='fa fa-edit' 
                                                 title='Edit data user admin' href='?page=edituseradmin&kdubah=$data[kode_admin]'
                                                    > Edit</a
                                                >
                                                <a class='fa fa-trash-o'  
                                                 title='Hapus Data user admin' href='?page=hapususeradmin&kdhapus=$data[kode_admin]'
                                                 onclick='return confirm(\"Beneran Mau di Hapus.?\")' 
                                                    ><i class='dw dw-delete-3'></i> Delete</a
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