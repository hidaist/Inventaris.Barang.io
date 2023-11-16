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
<?php include_once "../librari/inc.koneksi.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tamabah User</title>

</head>

<body>
<div class="content mt-3">
	<div class="animated fadeIn">
     <form action="" method="post" class="form-group" enctype='multipart/form-data'>
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Tambah Data User</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode User</label>
                                                <input id="cc-kode" 
                                                name="kduser"
                                                value="<?php echo 'USR-' . uniqid(); ?>" 
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
                                                    <label for="cc-name" class="control-label mb-1">Nama </label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="namapengguna" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>

                                                <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Jenis Kelamin</label>
                                                <select required name="cmbjeniskelamin" data-placeholder="" class="standardSelect" tabindex="1" >
                                                <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-Laki"> Laki-Laki </option>
                                                    <option value="Perempuan"> Perempuan </option>
                                                </select>
                                            </div>
                                            <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Tempat Lahir </label>
                                                    <input 
                                                    id="cc-name" 
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
                                                    class="form-control" required></textarea>
                                                   
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
                                                        >
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="cc-name" class="control-label mb-1">Password</label>
                                                        <input
                                                            id="password"
                                                            name="password"
                                                            type="password"
                                                            class="form-control"
                                                            required
                                                        >
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="cc-name" class="control-label mb-1">Konfirmasi Password</label>
                                                        <input
                                                            id="password_confirmation"
                                                            name="password_confirmation"
                                                            type="password"
                                                            class="form-control"
                                                            required
                                                        >
                                                        <p id="passwordMatchMessage"></p>
                                                    </div>

                                                    <script>
                                                        var password = document.getElementById("password");
                                                        var confirm_password = document.getElementById("password_confirmation");
                                                        var message = document.getElementById("passwordMatchMessage");

                                                        function validatePassword() {
                                                            if (password.value === confirm_password.value) {
                                                                message.innerHTML = "Password cocok";
                                                                message.style.color = "green";
                                                            } else {
                                                                message.innerHTML = "Password tidak cocok";
                                                                message.style.color = "red";
                                                            }
                                                        }

                                                        password.onkeyup = validatePassword;
                                                        confirm_password.onkeyup = validatePassword;
                                                    </script>
                                                    
                                                <div>
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
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
        $kduser             = mysqli_real_escape_string($koneksi, $_POST['kduser']);
        $email              = mysqli_real_escape_string($koneksi, $_POST['email']);
        $namapengguna       = mysqli_real_escape_string($koneksi, $_POST['namapengguna']);
        $cmbjeniskelamin    = mysqli_real_escape_string($koneksi, $_POST['cmbjeniskelamin']);
        $tempatlahir        = mysqli_real_escape_string($koneksi, $_POST['tempatlahir']);
        $tgllahir           = mysqli_real_escape_string($koneksi, $_POST['tgllahir']); 
        $alamat             = mysqli_real_escape_string($koneksi, $_POST['alamat']);
        $password           = mysqli_real_escape_string($koneksi, $_POST['password']); 
        $hashedPassword     = md5($password);


         // Ambil data gambar yang diunggah
         $gambar = $_FILES['NamaFile']['tmp_name'];

         // Tentukan path penyimpanan gambar
         $folder = __DIR__ . "/../gambarimage/";
         
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
         $add = mysqli_query($koneksi, " INSERT INTO  users  SET
                            kd_user       	        = '$kduser',
                            email        	        = '$email',
                            password        	    = '$hashedPassword',
                            nama        	        = '$namapengguna',
                            jenis_kelamin   	    = '$cmbjeniskelamin',
                            alamat	                = '$alamat',
                            tempat_lahir	        = '$tempatlahir',
                            tgl	                    = '$tgllahir',
                            foto                    = '$nama_gambar'
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
            document.location = '?page=tampiluser&blok1=true';
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
