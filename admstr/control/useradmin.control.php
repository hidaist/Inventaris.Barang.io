<?php
    // include database connection file
    include_once "../librari/inc.koneksi.php"; 
    // Add Data Submit ke database
    if(isset($_POST['submit'])) {
        $kdadmin 	        = mysqli_real_escape_string($koneksi, $_POST['kdadmin']);
        $useradmin 		    = mysqli_real_escape_string($koneksi, $_POST['useradmin']);
        $db_pass1 		    = mysqli_real_escape_string($koneksi, $_POST['pass']);
        $cmblevel 	        = mysqli_real_escape_string($koneksi, $_POST['cmblevel']);
        
        $hashedPassword = md5($db_pass1);
        // Insert user data into table
        $add = mysqli_query($koneksi, " INSERT INTO  admin SET
                            kode_admin       	    = '$kdadmin',
                            username        	    = '$useradmin',
                            password            	= '$hashedPassword',
                            level        	        = '$cmblevel'
                            ");
		//echo $add;
        if ($add) {
          echo "<font color='red'> Berhasil di Update. </font>" ;
          echo"<script>document.location='?page=views&views=adminviews&blok1=true';</script>";
      // Mengarahkan ke halaman ruangtampil.php
      exit();
    		} else {
      		die ('Gagal!' .mysqli_error($koneksi));
    	}
    }
// Update data ke database
if(isset($_POST['update'])) {
    $kdadmin 	        = mysqli_real_escape_string($koneksi, $_POST['kdadmin']);
    $useradmin 		    = mysqli_real_escape_string($koneksi, $_POST['useradmin']);
    $db_pass1 		    = mysqli_real_escape_string($koneksi, $_POST['pass']);
    $cmblevel 	        = mysqli_real_escape_string($koneksi, $_POST['cmblevel']);
    
    $hashedPassword = md5($db_pass1);
    
    
   
            
    // Insert user data into table
    $add = mysqli_query($koneksi, " UPDATE  admin SET
                        
                        username        	    = '$useradmin',
                        password            	= '$hashedPassword',
                        level        	        = '$cmblevel'
                        WHERE
                        kode_admin       	    = '$kdadmin'
                        ");
    echo $add;
    if ($add) {
        echo "<font color='red'> Berhasil di Update. </font>" ;
        echo"<script>document.location='?page=views&views=adminviews&blok1=true';</script>";
  // Mengarahkan ke halaman ruangtampil.php
  exit();
        } else {
          die ('Gagal!' .mysqli_error($koneksi));
    }
}
// Deleted data dari database
if (! $_GET['kdhapus']=="") {
    include_once "../librari/inc.koneksi.php";
    $sql = " DELETE FROM admin
                     WHERE kode_admin ='".$_GET['kdhapus']."'";
    mysqli_query($koneksi, $sql)
              or die ("Gagal query hapus".mysqli_error($koneksi));

    echo '<div class="col-sm-12">
    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-danger">Success</span> You successfully read this important alert message.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>';
    include "views/useradmin.views.php";
}
else {
    include "views/useradmin.views.php";
    exit;
}
    ?>