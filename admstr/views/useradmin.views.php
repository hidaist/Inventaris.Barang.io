<?php 
//error_reporting(0);
//session_start();
// cek session
// cek session sangat penting untuk USER yang ingin masuk/login tanpa proses login.


//include __DIR__. "../../../cek_login.php";
//include "../../session_admin.php";
?>
<?php include_once "../librari/inc.koneksi.php";
$sqladmin = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY username");

while ($dataarrayadmin = mysqli_fetch_array($sqladmin)){
    $arrayadmin[]=$dataarrayadmin;
    $no=1;
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
                                        
                                    <?php include_once "forms/useradmin.forms.php"; ?>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-12  animated fadeIn">
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
                                            <th> level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                <?php
                                foreach($arrayadmin as $data_arrayaadmin):?>
                                <tr>
                                    
                                    <td><?php echo $data_arrayaadmin['kode_admin']; ?></td>
                                    <td><?php echo $data_arrayaadmin['username']; ?></td>
                                    <td><?php echo $data_arrayaadmin['level']; ?></td>
                                    <td> 
                                     <a class='fa fa-edit' 
                                                 title='Edit data user admin' href='?page=forms&forms=admineditforms&kdedit=<?php echo $data_arrayaadmin['kode_admin']; ?>'
                                                    > Edit/Reset Pass</a
                                                >
                                                <a class='fa fa-trash-o'  
                                                 title='Hapus Data user admin' href='?page=control&control=admincontrol&kdhapus=<?php echo $data_arrayaadmin['kode_admin']; ?>'
                                                 onclick='return confirm("Beneran Mau di Hapus")' 
                                                    ><i class='dw dw-delete-3'></i> Delete</a
                                                >
                                                
                                          
                                    </td>
                                </tr>
                                <?php
                                endforeach;
                                ?>
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