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
if (! $_GET['kdubah']=="") {
    $sql  = "SELECT * FROM users WHERE kd_user='".$_GET['kdubah']."'";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit User Pengguna</title>

</head>

<body>
<div class="content mt-3">
	<div class="animated fadeIn">
     <form action="" method="post" class="form-group" enctype='multipart/form-data'>
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Edit Data User</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode User</label>
                                                <input id="cc-kode" 
                                                name="kduser"
                                                value="<?php echo $kduser; ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="mail" class="control-label mb-1">Email (*user name)</label>
                                                <input
                                                    id="mail"
                                                    name="email"
                                                    value="<?php echo $email; ?>"
                                                    type="email"
                                                    class="form-control"
                                                    required
                                                > <span id="emailAvailability"></span>
                                                </div>
                                                <!-- style format email input -->
                                                <style>
                                                /* Warna teks hijau untuk email tersedia */
                                                #emailAvailability.available {
                                                    color: green;
                                                }

                                                /* Warna teks merah untuk email sudah digunakan */
                                                #emailAvailability.used {
                                                    color: red;
                                                }
                                                </style>
                                                <script>
                                                    var email = document.getElementById("mail");
                                                    var emailAvailability = document.getElementById("emailAvailability");

                                                    email.addEventListener("input", function () {
                                                        var emailValue = email.value;

                                                        // Lakukan validasi email di sini jika diperlukan
                                                        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                                                        if (!emailPattern.test(emailValue)) {
                                                        emailAvailability.textContent = "Format email tidak valid";
                                                        emailAvailability.className = "used"; // Ganti kelas menjadi "used" untuk warna merah
                                                        return;
                                                        }

                                                        // Kirim permintaan ke server untuk memeriksa ketersediaan email
                                                        var xhr = new XMLHttpRequest();
                                                        xhr.open("GET", "check_email_availability.php?email=" + emailValue, true);
                                                        xhr.send();

                                                        xhr.onreadystatechange = function () {
                                                        if (xhr.readyState == 4 && xhr.status == 200) {
                                                            if (xhr.responseText === "available") {
                                                            emailAvailability.textContent = "Email tersedia";
                                                            emailAvailability.className = "available"; // Ganti kelas menjadi "available" untuk warna hijau
                                                            } else {
                                                            emailAvailability.textContent = "Email User sudah digunakan";
                                                            emailAvailability.className = "used"; // Ganti kelas menjadi "used" untuk warna merah
                                                            }
                                                        }
                                                        };
                                                    });
                                                    </script>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Nama</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $nama; ?>"
                                                    name="namapengguna" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                
                                                <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Jenis Kelamin</label>
                                                    <select data-placeholder="Pilih Jenis Kelamin" class="standardSelect" name="cmbkelamin" tabindex="1" required>
                                                    <option value=""></option>
                                                    <option value="Laki-laki" <?php if(trim($jenis_kelamin == "Laki-laki")) echo "selected"; ?> >Laki-laki</option>
                                                    <option value="Perempuan" <?php if(trim($jenis_kelamin == "Perempuan")) echo"selected";?> >Perempuan</option>
                                                </select><?php // echo"$kondisi";?>
                                            </div>
                                            <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Tempat Lahir</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $tempatlahir; ?>"
                                                    name="tempatlahir" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label date mb-1">Tanggal Lahir </label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="tgllahir"
                                                    value="<?php echo $tgl ?>" 
                                                    type="date" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Alamat</label>
                                                    <textarea id="cc-textarea" 
                                                    name="alamat" 
                                                    class="form-control" required> <?php echo $alamat ?></textarea>
                                                   
                                                </div>
                                                <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Foto Profil</label>
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
                                                <img src="../gambarimage/<?php echo $filegambar; ?>" style="max-width: 200px;" alt="Gambar saat ini"></p>
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
        $kduser             = mysqli_real_escape_string($koneksi, $_POST['kduser']);
        $email              = mysqli_real_escape_string($koneksi, $_POST['email']);
        $namapengguna       = mysqli_real_escape_string($koneksi, $_POST['namapengguna']);
        $cmbkelamin         = mysqli_real_escape_string($koneksi, $_POST['cmbkelamin']);
        $tempatlahir        = mysqli_real_escape_string($koneksi, $_POST['tempatlahir']);
        $tgllahir           = mysqli_real_escape_string($koneksi, $_POST['tgllahir']); 
        $alamat             = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        
         // Ambil data gambar yang diunggah
         $gambar = $_FILES['NamaFile']['tmp_name'];

         // Tentukan path penyimpanan gambar
         $folder = __DIR__ . "/../gambarimage/";
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
         $update = mysqli_query($koneksi, " UPDATE  users  SET
                            
                            email        	        = '$email',
                            nama        	        = '$namapengguna',
                            jenis_kelamin   	    = '$cmbkelamin',
                            alamat	                = '$alamat',
                            tempat_lahir	        = '$tempatlahir',
                            tgl	                    = '$tgllahir',
                            foto                    = '$nama_gambar'
                            WHERE
                            kd_user        	        = '$kduser'
                            ");
                           
                         //   $folder = __DIR__ . "/image/"; // ubah directory
                          //  $upload_image = $_FILES['NamaFile']['name'];
                          //  $filesave = $folder . $upload_image;
                          //  move_uploaded_file($_FILES['NamaFile']['tmp_name'], $filesave);
                            
                          //  $unique_name = uniqid(); // Get uniq
                          //  $resize_image = $folder . "resize_" . $unique_name . ".jpg";

		echo $add;
        if ($update) {
          echo "<font color='red'> Berhasil di Update. </font>" ;
          echo"<script>document.location='?page=tampiluser&blok1=true';</script>";
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
