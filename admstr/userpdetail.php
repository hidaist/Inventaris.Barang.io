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
    $sql  = "SELECT * FROM users WHERE kd_user='".$_GET['kddetail']."'";
     //echo"$sql";
    $qry  = mysqli_query($koneksi, $sql) or die ("Gagal sql");
    $data = mysqli_fetch_array($qry);
    
            $kduser         = $data['kd_user'];
            $email          = $data['email'];
            $nama           = $data['nama'];
            $jenis_kelamin  = $data['jenis_kelamin'];
            $alamat         = $data['alamat'];
            $tempatlahir    = $data['tempat_lahir'];
            $tgl            = $data['tgl'];
            $filegambar     = $data['foto'];
    
}
 ?>
<html>
<head> 
<style>
    .fit-image {
        width: 180px;
        height: 180px;
        object-fit: cover;
    }
</style>
<link rel="stylesheet" href="lightbox/dist/css/lightbox.min.css">

</head>

<body> <center>
<div class="col-md-4">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <a href="../gambarimage/<?php echo $filegambar;?>" data-lightbox="example-set" data-title="<?php echo $kduser; echo'<br>';echo $nama; echo'<br>';echo $jenis_kelamin;?>">
                                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="../gambarimage/<?php echo $filegambar;?>">
                                        </a>
                                        <div class="media-body">
                                            <h2 class="text-light display-6" title="Nama User"><?php echo $nama ; ?></h2>
                                           <p class="fa fa-key text-sm-center" title="Kode Unik User"> <?php echo $kduser ; ?> </p> 
                                        </div>
                                    </div>
                                </div>


                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" title="Jenis Kelamin">
                                         <i class="fa <?php
                                                    if($jenis_kelamin=='Laki-laki')
                                                        echo"fa-male";
                                                        else
                                                        echo"fa-female"; ?>"  > </i> <?php echo $jenis_kelamin ; ?> 
                                    </li>
                                    <li class="list-group-item" title="Email User (*User Name)">
                                        <a href="https://www.<?php echo $email ; ?>" target="_blank"> <i class="fa fa-envelope-o" title="Email User (*User Name)"></i> <?php echo $email ; ?> </a>
                                    </li>
                                    <li class="list-group-item" title="Tempat Lahir">
                                        <a href="https://www.google.com/maps/place/<?php echo $tempatlahir; ?>" target="_blank" > <i class="fa fa-map-marker"></i> <?php echo $tempatlahir; ?> </a>
                                    </li>
                                    <li class="list-group-item" title="Tanggal Lahir">
                                         <i class="fa fa-calendar-o text-sm-center" title="Tanggal Lahir"></i> <?php echo date('d.M.Y', strtotime($tgl)); ?>
                                    </li>
                                    <li class="list-group-item" title="Alamat User">
                                        <a href="https://www.google.com/maps/place/<?php echo $alamat; ?>"target="_blank"> <i class="card-title mb-3 fa fa-map text-sm-center" title="Alamat"> </i> <?php echo $alamat; ?> </a>
                                    </li>
                                </ul>
                                <div class="card-footer">
                                <strong class="card-title mb-3"><a  class="btn btn-success fa fa-book " title="Edit Data User" href="?page=edituserp&kdubah=<?php echo $data['kd_user']; ?>"> Edit Data User</a>    
                                <a  class="btn btn-danger fa fa-trash " title="Hapus Data User" href="?page=hapususerp&kdhapus=<?php echo $data['kd_user']; ?>" onclick="return confirm('Beneran Mau di Hapus.?')"> Delete Data User</a></strong>
                            </div>
                            <div class="card-footer">
                                <strong class="card-title mb-3"><a  class="btn  fa fa-arrow-left " title="Kembali/Back" href="javascript:window.history.back();"> Back</a>    
                                </strong>
                            </div>
                            </section>
                            
                        </aside>
                        
                    </div>
<!--      ---------------------------------------------------------------------------------------- 
<div class="col-md-6" align="center">
                        <div class="card">
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                <a href="../gambarimage/<?php echo $filegambar;?>" data-lightbox="example-set" data-title="<?php echo $kduser; echo'<br>';echo $nama; echo'<br>';echo $jenis_kelamin;?>"> 
                                <img class="rounded-circle mx-auto d-block fit-image zoom-image"  src="../gambarimage/<?php echo $filegambar;?>" alt="Card image cap"> </a>
                                    <h5 class="text-sm-center mt-2 mb-1" title="Nama User"><?php echo $nama ; ?></h5>
                                    <div class="fa <?php
                                                    if($jenis_kelamin=='Laki-laki')
                                                        echo"fa-male";
                                                        else
                                                        echo"fa-female"; ?> 
                                                        text-sm-center" title="Jenis Kelamin"><?php echo $jenis_kelamin ; ?></div>
                                                        <br>
                                    <div class="fa fa-calendar-o text-sm-center" title="Tempat Lahir"><?php echo $tempatlahir; ?></div>
                                    <div class="fa  text-sm-center" title="Tanggal Lahir"><?php echo date('d.M.Y', strtotime($tgl)); ?></div> <br>
                                    <div class="fa fa-key text-sm-center" title="Kode Unik User"><?php echo $kduser ; ?></div>
                                   <br><div class="fa fa-envelope text-sm-center" title="Email User (*User Name)"> <?php echo $email ; ?></div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                <h4 class="card-title mb-3 fa fa-map text-sm-center" title="Alamat"> <b> <?php echo $alamat; ?> </b></h4>
                                </div>
                            </div>
                            <div class="typo-articles">
                                <?php echo nl2br(htmlspecialchars($keterangan)); ?>
                            </div>
                            <div class="card-footer">
                                <strong class="card-title mb-3"><a  class="btn btn-success fa fa-book " title="Edit Data User" href="?page=edituserp&kdubah=<?php echo $data['kd_user']; ?>"> Edit Data User</a>    
                                <a  class="btn btn-danger fa fa-trash " title="Hapus Data User" href="?page=hapususerp&kdhapus=<?php echo $data['kd_user']; ?>" onclick="return confirm('Beneran Mau di Hapus.?')"> Delete Data User</a></strong>
                            </div>
                            <div class="card-footer">
                                <strong class="card-title mb-3"><a  class="btn  fa fa-arrow-left " title="Tambah Barang" href="javascript:window.history.back();"> Back</a>    
                                </strong>
                            </div>
                        </div>
                    </div>
                    </center>  -->
                    <script src="lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
                    <script>
                    lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true
                    })
                    </script>
</body>
</html>