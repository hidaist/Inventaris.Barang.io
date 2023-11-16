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


if (! $_GET['kdubah']=="") {
        $sql  = "SELECT * FROM barang, ruang Where ruang.kd_ruang=barang.kd_ruang AND kd_barang='".$_GET['kdubah']."'";
 //       echo"$sql";
        $qry  = mysqli_query($koneksi, $sql) or die ("Gagal sql");
        $data = mysqli_fetch_array($qry);
        
                $kdbarang = $data['kd_barang'];
                $nobarang = $data['no_barang'];
                $nmbarang = $data['nm_barang'];
                $kdruang  = $data['kd_ruang'];
                $kondisi  = $data['kondisi_barang'];
                $keterangan = $data['keterangan_barang'];
                $filegambar = $data['filegambar'];
                $pembelian = $data['date_pembelian'];
                $hrbarang = $data['harga_barang'];
                $danaawal = $data['anggaran_awal'];
        
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Barang Inventaris</title>

</head>

<body>
<div class="content mt-3">
	<div class="animated fadeIn">
     <form action="" method="post" class="form-group" enctype='multipart/form-data'>
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Edit Data Barang</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Barang</label>
                                                <input id="cc-kode" 
                                                name="kdbarang"
                                                value="<?php echo $kdbarang; ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">No Barang</label>
                                                    <input 
                                                    id="cc-name"
                                                    value="<?php echo $nobarang ?>" 
                                                    name="nobarang" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Nama Barang</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $nmbarang; ?>"
                                                    name="namabarang" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Ruang</label>
                                                <select required name="cmbruang" data-placeholder="" class="standardSelect" tabindex="1" >
                                                <option value="">Pilih Ruang</option>
                                              <?php
                                                            $sql = "SELECT * FROM ruang ORDER BY kd_ruang";
                                                            $qry = @mysqli_query($koneksi, $sql) or die ("Gagal query");
                                                            while ($data =mysqli_fetch_array($qry)) {
                                                                if ($data['kd_ruang']==$kdruang){
                                                                    $cek="selected";
                                                                }
                                                                else {$cek="";}

                                                                    echo "<option value='$data[kd_ruang]' $cek>$data[nm_ruang]</option>";
                                                            }
                                                            ?>
                                            </select>
                                            </div>
                                                <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Kondisi Barang</label>
                                                    <select data-placeholder="Pilih Kondisi" class="standardSelect" name="cmbkondisi" tabindex="1" required>
                                                    <option value=""></option>
                                                    <option value="B" <?php if(trim($kondisi == "B")) echo "selected"; ?> >Baik</option>
                                                    <option value="RR" <?php if(trim($kondisi == "RR")) echo"selected";?> >Rusak Ringan</option>
                                                    <option value="RB" <?php if(trim($kondisi == "RB")) echo"selected"; ?> >Rusak Berat</option>
                                                    
                                                </select><?php // echo"$kondisi";?>
                                            </div>
                                            <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Tanggal Beli</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="tglbeli"
                                                    value="<?php echo $pembelian; ?>" 
                                                    type="date" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Harga Barang</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="hrbarang"
                                                    value="<?php echo $hrbarang; ?>" 
                                                    type="number" 
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
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Dana Pembelian</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="dana"
                                                    value="<?php echo $danaawal; ?>" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
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
                                                > <?php if (!empty($filegambar)): ?>
                                                <input type="hidden" name="filegambar_lama" value="<?php echo $filegambar; ?>">
                                                <p class="mt-2">Gambar saat ini: <?php echo $filegambar; ?> <br> 
                                                <img src="image/<?php echo $filegambar; ?>" style="max-width: 200px;" alt="Gambar saat ini"></p>
                                            <?php endif; ?>
                                            </div>
                                                <div>
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="update">
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
        
         // Ambil data gambar yang diunggah
         $gambar = $_FILES['NamaFile']['tmp_name'];

         // Tentukan path penyimpanan gambar
         $folder = __DIR__ . "/image/";
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
                            anggaran_awal             = '$dana'
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
          echo"<script>document.location='?page=lihatbarang&blok1=true';</script>";
      // Mengarahkan ke halaman ruangtampil.php
      exit();
    		} else {
      		die ('Gagal!' .mysqli_error($koneksi));
    	}
    }
    ?>
</div>
</body>
</html>
