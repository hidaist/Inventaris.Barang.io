<?php
    // include database connection file
    include_once "../librari/inc.koneksi.php"; 
    // ---------------------SImpan data button submit.
    if(isset($_POST['submit'])) {
        $kdbarang = mysqli_real_escape_string($koneksi, $_POST['kdbarang']);
        $nobarang = mysqli_real_escape_string($koneksi, $_POST['nobarang']);
        $namabarang = mysqli_real_escape_string($koneksi, $_POST['namabarang']);
        $cmbruang = mysqli_real_escape_string($koneksi, $_POST['cmbruang']);
        $cmbkondisi = mysqli_real_escape_string($koneksi, $_POST['cmbkondisi']);
        $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
        $tglbeli = mysqli_real_escape_string($koneksi, $_POST['tglbeli']);
        $hrbarang = mysqli_real_escape_string($koneksi, $_POST['hrbarang']);
        $dana = mysqli_real_escape_string($koneksi, $_POST['dana']);
        $unit = mysqli_real_escape_string($koneksi, $_POST['cmbunit']);
        $nmmerk = mysqli_real_escape_string($koneksi, $_POST['nmmerk']);
        $nmtype = mysqli_real_escape_string($koneksi, $_POST['nmtype']);
        $nmbahan = mysqli_real_escape_string($koneksi, $_POST['nmbahan']);
          
        
         // Ambil data gambar yang diunggah
         $gambar = $_FILES['NamaFile']['tmp_name'];

         // Tentukan path penyimpanan gambar
         $folder = __DIR__ . "../../../image/";
         
         // Generate nama file unik
         $unique_name = uniqid();
         $nama_gambar = $unique_name . ".jpg"; // Ubah ekstensi sesuai format gambar yang diunggah
         
         // Simpan file gambar di path yang ditentukan
         $filesave = $folder . $nama_gambar;
         move_uploaded_file($gambar, $filesave);
        
        $file_size = filesize($filesave);
        
         // Periksa ukuran file dan konversi jika diperlukan
        if ($file_size > 1000000) {
            // Mengkonversi gambar ke 700 KB
            $quality =30.0; // Kualitas gambar (0.0 - 100.0)
            $resized_file = $filesave; // Gunakan nama file asli jika tidak ingin mengubah nama
    
            // Mengubah ukuran gambar sesuai dengan batas maksimum 700 KB
            list($width, $height) = getimagesize($filesave);
            $aspect_ratio = $width / $height;
            $new_width = sqrt(700000 * $aspect_ratio);
            $new_height = $new_width / $aspect_ratio;
    
            // Buat gambar baru dengan ukuran yang diubah
            $img = imagecreatefromjpeg($filesave);
            $resized_img = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($resized_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            imagejpeg($resized_img, $resized_file, $quality);
            imagedestroy($img);
            imagedestroy($resized_img);
        }
        
        // Insert  data into table
         $add = mysqli_query($koneksi, " INSERT INTO  barang  SET
                            kd_barang       	      = '$kdbarang',
                            no_barang        	      = '$nobarang',
                            nm_barang        	      = '$namabarang',
                            kd_ruang        	      = '$cmbruang',
                            kondisi_barang   	      = '$cmbkondisi',
                            date_pembelian            = '$tglbeli',
                            merk                      = '$nmmerk',
                            type                      = '$nmtype',
                            bahan                     = '$nmbahan',
                            keterangan_barang	      = '$keterangan',
                            filegambar                = '$nama_gambar',
                            harga_barang              = '$hrbarang',
                            anggaran_awal             = '$dana',
                            sat                       = '$unit',
                            stat                      = '1'
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
            document.location = '?page=views&views=barangViews&blok1=true';
            </script>";
        exit();
        } else {
                die ('Gagal!' .mysqli_error($koneksi));
          }
      }
      
      //------------------ Update Data button update

      if(isset($_POST['update'])) {
        $kdbarang   = mysqli_real_escape_string($koneksi, $_POST['kdbarang']);
        $nobarang   = mysqli_real_escape_string($koneksi, $_POST['nobarang']);
        $namabarang = mysqli_real_escape_string($koneksi, $_POST['namabarang']);
        $cmbruang   = mysqli_real_escape_string($koneksi, $_POST['cmbruang']);
        $cmbkondisi = mysqli_real_escape_string($koneksi, $_POST['cmbkondisi']);
        $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
        $tglbeli    = mysqli_real_escape_string($koneksi, $_POST['tglbeli']);
        $hrbarang   = mysqli_real_escape_string($koneksi, $_POST['hrbarang']);
        $dana       = mysqli_real_escape_string($koneksi, $_POST['dana']); 
        $unit       = mysqli_real_escape_string($koneksi, $_POST['cmbunit']);   
        $nmmerk     = mysqli_real_escape_string($koneksi, $_POST['nmmerk']);
        $nmtype     = mysqli_real_escape_string($koneksi, $_POST['nmtype']);
        $nmbahan    = mysqli_real_escape_string($koneksi, $_POST['nmbahan']);
        
         // Ambil data gambar yang diunggah
         $gambar = $_FILES['NamaFile']['tmp_name'];

         // Tentukan path penyimpanan gambar
         $folder = __DIR__ . "../../../image/";
          if(!empty($gambar)) {
            // Generate nama file unik
            $unique_name = uniqid();
            $nama_gambar = $unique_name . ".jpg"; // Ubah ekstensi sesuai format gambar yang diunggah

            // Simpan file gambar di path yang ditentukan
            $filesave = $folder . $nama_gambar;
            move_uploaded_file($gambar, $filesave);

            // Periksa ukuran file dan konversi jika diperlukan
            $file_size = filesize($filesave);
            if ($file_size > 1000000) {
                // Mengkonversi gambar ke 700 KB
                $quality = 40; // Kualitas gambar (0 - 100)

                // Mengubah ukuran gambar sesuai dengan batas maksimum 1 MB
                list($width, $height) = getimagesize($filesave);
                $aspect_ratio = $width / $height;
                $new_width = sqrt(1000000 * $aspect_ratio);
                $new_height = $new_width / $aspect_ratio;

                // Buat gambar baru dengan ukuran yang diubah
                $img = imagecreatefromjpeg($filesave);
                $resized_img = imagecreatetruecolor($new_width, $new_height);
                imagecopyresampled($resized_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagejpeg($resized_img, $filesave, $quality);
                imagedestroy($img);
                imagedestroy($resized_img);
            }
        } else {
            $nama_gambar = $_POST['filegambar_lama'];
        }
                
        // Insert user data into table
         $update = mysqli_query($koneksi, " UPDATE  barang  SET
                            
                            no_barang        	      = '$nobarang',
                            nm_barang        	      = '$namabarang',
                            kd_ruang        	      = '$cmbruang',
                            kondisi_barang   	      = '$cmbkondisi',
                            date_pembelian            = '$tglbeli',
                            keterangan_barang	      = '$keterangan',
                            filegambar                = '$nama_gambar',
                            harga_barang              = '$hrbarang',
                            anggaran_awal             = '$dana',
                            sat                       = '$unit',
                            merk                      = '$nmmerk',
                            type                      = '$nmtype',
                            bahan                     = '$nmbahan'
                            WHERE
                            kd_barang       	      = '$kdbarang'
                            ");
                           
                         //   $folder = __DIR__ . "/image/"; // ubah directory
                          //  $upload_image = $_FILES['NamaFile']['name'];
                          //  $filesave = $folder . $upload_image;
                          //  move_uploaded_file($_FILES['NamaFile']['tmp_name'], $filesave);
                            
                          //  $unique_name = uniqid(); // Get uniq
                          //  $resize_image = $folder . "resize_" . $unique_name . ".jpg";

		//echo $add;
        if ($update) {
          echo "<font color='red'> Berhasil di Update. </font>" ;
          echo"<script>document.location='?page=views&views=barangViews&blok1=true';</script>";
      // Mengarahkan ke halaman ruangtampil.php
      exit();
    		} else {
      		die ('Gagal!' .mysqli_error($koneksi));
    	}
    }

      //----------------Delete data 
      if (!empty($_GET['kdhapus'])) {
        include_once "../librari/inc.koneksi.php";
        
        // Ambil nama file gambar yang akan dihapus
        $sql = "SELECT filegambar FROM barang WHERE kd_barang='".$_GET['kdhapus']."'";
        $qry = mysqli_query($koneksi, $sql) or die("Gagal sql");
        $data = mysqli_fetch_array($qry);
        $filegambar = $data['filegambar'];
        
        // Hapus file gambar jika ada
        if (!empty($filegambar)) {
            $path = __DIR__ . "../../../image/" . $filegambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        // Hapus data dari tabel
        $sql = "DELETE FROM barang WHERE kd_barang='".$_GET['kdhapus']."'";
        mysqli_query($koneksi, $sql) or die("Gagal query hapus".mysqli_error($koneksi));
        
        echo '<div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-danger">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>';
        include "views/barang.views.php";
    } else {
        include "views/barang.views.php";
        exit;
    }
      ?>