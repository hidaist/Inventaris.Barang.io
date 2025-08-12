<?php
    // include database connection file
    include_once "../librari/inc.koneksi.php"; 
    // Check If form submitted, insert form data into tb_absen.
    if(isset($_POST['submit'])) {
        $kdpinjam = mysqli_real_escape_string($koneksi, $_POST['kdpinjam']);
        $cmbbarang = mysqli_real_escape_string($koneksi, $_POST['cmbbarang']);
        $namapinjam = mysqli_real_escape_string($koneksi, $_POST['namapinjam']);
        $datepinjam = mysqli_real_escape_string($koneksi, $_POST['datepinjam']);
        $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
        
        //explode
        //list($kduser,$namauser)= explode(",", $namapinjam);
       //$kduser = mysqli_real_escape_string($koneksi, $kduser);
       //$namauser = mysqli_real_escape_string($koneksi, $namauser);
        
        // Insert  data into table
         $add = mysqli_query($koneksi, " INSERT INTO  barang_pinjam  SET
                            kd_pinjam       	      = '$kdpinjam',
                            kd_barang        	      = '$cmbbarang',
                            nm_peminjam        	      = '$namapinjam',
                            date_pinjam        	      = '$datepinjam',
                            keterangan_pinjam  	      = '$keterangan'
                            ");
                           
                         //   $folder = __DIR__ . "/image/"; // ubah directory
                          //  $upload_image = $_FILES['NamaFile']['name'];
                          //  $filesave = $folder . $upload_image;
                          //  move_uploaded_file($_FILES['NamaFile']['tmp_name'], $filesave);
                            
                          //  $unique_name = uniqid(); // Get uniq
                          //  $resize_image = $folder . "resize_" . $unique_name . ".jpg";

		//echo $add;
        if ($add) {
            echo "<font color='red'> Berhasil di Update. </font>";
             echo "<script>
            document.location = '?page=views&views=pinjamBarangViews&blok1=true';
            </script>";
        exit(); 
        } else {
                die ('Gagal!' .mysqli_error($koneksi));
          }
      }
      ?>