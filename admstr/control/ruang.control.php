<?php
    // include database connection file
    include_once "../librari/inc.koneksi.php"; 
    // Check If form submitted, insert form data into tb_absen.
    if(isset($_POST['submit'])) {
        $kdruangin 	        = mysqli_real_escape_string($koneksi, $_POST['kdruangin']);
        $nmruangin 		    = mysqli_real_escape_string($koneksi, $_POST['nmruangin']);
        $detailruangin 	    = mysqli_real_escape_string($koneksi, $_POST['detailruangin']);
                
        // Insert user data into table
        $add = mysqli_query($koneksi, " INSERT INTO  ruang SET
                            kd_ruang       	        = '$kdruangin',
                            nm_ruang        	    = '$nmruangin',
                            detail_ruang        	= '$detailruangin'
                            ");
		echo $add;
        if ($add) {
          echo "<font color='red'> Berhasil di Update. </font>" ;
          echo"<script>document.location='?page=views&views=ruangViews&blok1=true';</script>";
      // Mengarahkan ke halaman ruangtampil.php
      exit();
    		} else {
      		die ('Gagal!' .mysqli_error($koneksi));
    	}
    }
     // Update Form Data Ruang
     if(isset($_POST['update'])) {
        $kdruangin 	        = mysqli_real_escape_string($koneksi, $_POST['kdruangin']);
        $nmruangin 		    = mysqli_real_escape_string($koneksi, $_POST['nmruangin']);
        $detailruangin 	    = mysqli_real_escape_string($koneksi, $_POST['detailruangin']);
                
        // Insert user data into table
        $add = mysqli_query($koneksi, " UPDATE  ruang SET
                            nm_ruang        	    = '$nmruangin',
                            detail_ruang        	= '$detailruangin'
                            WHERE
                            kd_ruang       	        = '$kdruangin'
                            ");
		echo $add;
        if ($add) {
          echo "<font color='red'> Berhasil di Update. </font>" ;
          echo"<script>document.location='?page=views&views=ruangViews&blok1=true';</script>";
      // Mengarahkan ke halaman ruangtampil.php
      exit();
    		} else {
      		die ('Gagal!' .mysqli_error($koneksi));
    	}
    }
    // Delete Data Ruang 
    if (! $_GET['kdhapus']=="") {
        include_once "../librari/inc.koneksi.php";
        $sql = " DELETE FROM ruang
                         WHERE kd_ruang ='".$_GET['kdhapus']."'";
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
        include "views/ruang.views.php";
    }
    else {
        include "views/ruang.views.php";
        exit;
    }
    ?>