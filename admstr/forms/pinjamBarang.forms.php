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

// Display selected user data based on id
// Getting id from url


if (!empty($_GET['kdubah'])) {
        $sqlpinjam  = "SELECT * FROM barang_pinjam Where kd_pinjam='".$_GET['kdubah']."'";
 //      echo"$sql";
        $qrypinjam  = mysqli_query($koneksi, $sqlpinjam) or die ("Gagal sql");
        $data = mysqli_fetch_array($qrypinjam);
        
                $kdpinjam = $data['kd_pinjam'];
                $kdbarang = $data['kd_barang'];
                $nmpinjam = $data['nm_peminjam'];
                $date  = $data['date_pinjam'];
                $keterangan  = $data['keterangan_pinjam'];
                
        
}
// Buat Var
$kdpinjam       = ($kdpinjam  != "") ? $kdpinjam : 'PJB-' . uniqid();
$nmpinjam       = ($nmpinjam  != "") ? $nmpinjam : "";
$date           = ($date  != "") ? $date : "";
$keterangan     = ($keterangan  != "") ? $keterangan : "";
$button         = (!empty($_GET['kdubah'])) ? "update" : "submit";
?>
<?php include_once "../librari/inc.koneksi.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Peminjaman Barang</title>

</head>

<body>
<div class="content mt-3">
	<div class="animated fadeIn">
     <form action="?page=control&control=pinjamBarangControl" method="post" class="form-group" enctype='multipart/form-data'>
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Peminjaman Barang</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Pinjam Barang</label>
                                                <input id="cc-kode" 
                                                name="kdpinjam"
                                                value="<?php echo $kdpinjam; ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Nama Barang</label>
                                                <select required name="cmbbarang" data-placeholder="" class="standardSelect" tabindex="1" >
                                                <option value="">Pilih Barang</option>
                                              <?php
                                                            $sql = "SELECT * FROM barang, ruang WHERE barang.kd_ruang=ruang.kd_ruang AND barang.stat='1'";
                                                            $qry = @mysqli_query($koneksi, $sql) or die ("Gagal query");
                                                            while ($data =mysqli_fetch_array($qry)) {
                                                                if ($data['kd_barang']==$kdbarang){
                                                                    $cek="selected";
                                                                }
                                                                else {$cek="";}

                                                                    echo "<option value='$data[kd_barang]' $cek>$data[nm_barang],no $data[no_barang]</option>";
                                                            }
                                                            ?>
                                            </select>
                                            </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Nama Peminjam</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="namapinjam" 
                                                    value="<?php echo $nmpinjam; ?>"
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                              
                                            <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Tanggal Pinjam</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="datepinjam"
                                                    value="<?php echo $date; ?>" 
                                                    type="date" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Keterangan</label>
                                                    <textarea id="cc-textarea" 
                                                    name="keterangan" 
                                                    class="form-control" required><?php echo $keterangan; ?></textarea>
                                                   
                                                </div>
                                               <!--
                                                <div class="form-group has-success">
                                                        <label for="cc-name" class="control-label mb-1">File Gambar</label>
                                                        <input 
                                                            name="NamaFile" 
                                                            type="file"
                                                            id="captureInput"
                                                            class="dropify form-control-file form-control height-auto" 
                                                            data-max-file-size="1M"
                                                            data-errormessage-value-missing="Upload Foto"
                                                            accept="image/*"
                                                            capture
                                                        >
                                                    </div> -->
                                                    
                                                <div>
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="<?php echo $button; ?>">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="">Simpan Data</span>
                                                        
                                                    </button>
                                                </div>
     
     </form>
	</div>
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
        
          
        
         // Ambil data gambar yang diunggah
         $gambar = $_FILES['NamaFile']['tmp_name'];

         // Tentukan path penyimpanan gambar
         $folder = __DIR__ . "/image/";
         
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
            $quality =40.0; // Kualitas gambar (0.0 - 100.0)
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
         $add = mysqli_query($koneksi, " UPDATE  barang_pinjam  SET
                            
                            kd_barang        	      = '$cmbbarang',
                            nm_peminjam        	      = '$namapinjam',
                            date_pinjam        	      = '$datepinjam',
                            keterangan_pinjam  	      = '$keterangan'
                            WHERE
                            kd_pinjam       	      = '$kdpinjam'
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
            document.location = '?page=barangpinjam&blok1=true';
            </script>";
        exit();
        } else {
                die ('Gagal!' .mysqli_error($koneksi));
          }
      }
      ?>
</div>

</body>
</html>
