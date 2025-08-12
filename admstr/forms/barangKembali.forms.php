<?php 
error_reporting(0);
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
if (! $_GET['kdkembali']=="") {
    $sql  = "SELECT * FROM barang_pinjam Where kd_pinjam='".$_GET['kdkembali']."'";
//       echo"$sql";
    $qry  = mysqli_query($koneksi, $sql) or die ("Gagal sql");
    $data = mysqli_fetch_array($qry);
    
            $kdbarang = $data['kd_barang'];
            $kdpinjam = $data['kd_pinjam'];
            $nama     = $data['nm_peminjam'];
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pengembalian Barang</title>

</head>

<body>
<div class="content mt-3">
	<div class="animated fadeIn">
     <form action="?page=control&control=barangKembaliControl" method="post" class="form-group" enctype='multipart/form-data'>
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Pengembalian Barang</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Pengembalian Barang</label>
                                                <input id="cc-kode" 
                                                name="kdkembali"
                                                value="<?php echo 'KJB-' . uniqid(); ?>" 
                                                type="text" 
                                                class="form-control" 
                                                aria-required="true" 
                                                aria-invalid="false" 
                                                readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Peminjaman Barang</label>
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
                                                <select required name="nmbarang" data-placeholder="" class="standardSelect" tabindex="1" >
                                                <option value="">Pilih Barang</option>
                                              <?php
                                                            $sql = "SELECT * FROM barang, barang_pinjam WHERE 
                                                            barang_pinjam.kd_barang=barang.kd_barang AND 
                                                            kd_pinjam='$kdpinjam'";
                                                            $qry = @mysqli_query($koneksi, $sql) or die ("Gagal query");
                                                            while ($data =mysqli_fetch_array($qry)) {
                                                                  $cek='selected';
                                                                    echo "<option value='$data[kd_barang]' $cek>$data[nm_barang],no $data[no_barang]</option>";
                                                            }
                                                            ?>
                                            </select>
                                            </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Nama Peminjam</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $nama; ?>"
                                                    name="" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" readonly>
                                                   
                                                </div>
                                              
                                            <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Tanggal Pengembalian</label>
                                                    <input 
                                                    id="cc-name" 
                                                    name="datekembali" 
                                                    type="date" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <!--
                                                <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Barang Sudah Kembali</label><br>
                                                    <label class="switch switch-text switch-success switch-pill input-lg" require>   
                                                        <input type="checkbox" class="switch-input" name="checkkembali" value="1" checked="true" required>
                                                        <span data-on="Yes" data-off="No" class="switch-label"></span> 
                                                        <span class="switch-handle"></span>
                                                    </label> 

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
                                                        >
                                                    </div> -->
                                                    
                                                <div>
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="">Simpan Data</span>
                                                        
                                                    </button>
                                                </div>
     
     </form>
	</div>
   
</div>

</body>
</html>
