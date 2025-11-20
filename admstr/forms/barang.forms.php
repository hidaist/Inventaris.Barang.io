<?php 
error_reporting(0);
// cek session
// cek session sangat penting untuk USER yang ingin masuk/login tanpa proses login.
//include "../cek_login.php";
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
        $sqlbarang  = "SELECT * FROM barang, ruang Where ruang.kd_ruang=barang.kd_ruang AND kd_barang='".$_GET['kdubah']."'";
 //       echo"$sql";
        $qrybarang  = mysqli_query($koneksi, $sqlbarang) or die ("Gagal sql");
        $databarang = mysqli_fetch_array($qrybarang);
        
                $kdbarang = $databarang['kd_barang'];
                $noidbarang = $databarang['no_barang'];
                $nmbarang = $databarang['nm_barang'];
                $kdruang  = $databarang['kd_ruang'];
                $kondisi  = $databarang['kondisi_barang'];
                $merk  = $databarang['merk'];
                $type  = $databarang['type'];
                $keterangan = $databarang['keterangan_barang'];
                $filegambar = $databarang['filegambar'];
                $pembelian = $databarang['date_pembelian'];
                $hrbarang = $databarang['harga_barang'];
                $danaawal = $databarang['anggaran_awal'];
                $unit = $databarang['sat'];
        
}
$kd_barang      = ($kdbarang  != "") ? $kdbarang : 'INV-' . uniqid();
$no_barang      = ($noidbarang  != "") ? $noidbarang : "";
$nm_barang      = ($nmbarang  != "") ? $nmbarang : "";
$kondisi        = ($kondisi  != "") ? $kondisi : "";
$nm_merk        = ($merk  != "") ? $merk : "";
$nm_type        = ($type  != "") ? $type : "";
$keterangan     = ($keterangan  != "") ? $keterangan : "";
$pembelian      = ($pembelian  != "") ? $pembelian : "";
$hrbarang       = ($hrbarang  != "") ? $hrbarang : "";
$danaawal       = ($danaawal  != "") ? $danaawal : "";
$unit           = ($unit  != "") ? $unit : "";
$button         = (!empty($_GET['kdubah'])) ? "update" : "submit";
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

<div class="content mt-3 table-responsive">
	<div class="animated fadeIn">
    <div class="">
        
                
                         <!-- ------------------------------ -->   
                        
                         <form action="?page=control&control=barangControl" method="post" class="form-group" enctype='multipart/form-data'>
     <div class="form-group text-center">
                                                <h3 class="text-body help-block"> Edit Data Barang</h3>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Kode Barang</label>
                                                <input id="cc-kode" 
                                                name="kdbarang"
                                                value="<?php echo $kd_barang; ?>" 
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
                                                    value="<?php echo $no_barang; ?>" 
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
                                                    value="<?php echo $nm_barang; ?>"
                                                    name="namabarang" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Merk</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $nm_merk; ?>"
                                                    name="nmmerk" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                   
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Type</label>
                                                    <input 
                                                    id="cc-name" 
                                                    value="<?php echo $nm_type; ?>"
                                                    name="nmtype" 
                                                    type="text" 
                                                    class="form-control " 
                                                    aria-required="true" 
                                                    aria-invalid="false" 
                                                    aria-describedby="cc-name-error" required>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="cc-name" class="control-label mb-1">Keterangan/Spesifikasi</label>
                                                    <textarea id="cc-textarea" 
                                                        name="keterangan" 
                                                        class="form-control" required><?php echo $keterangan; ?></textarea>
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
                                                
                                            <!--
                                                <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Instansi</label>
                                                    <select data-placeholder="Pilih Unit" class="standardSelect" name="cmbunit" tabindex="1" required>
                                                    <option value=""></option>
                                                    <option value="Instansi Kesehatan" <?php if(trim($unit == "Instansi Kesehatan")) echo "selected"; ?> >Instansi Kesehatan</option>
                                                    <option value="Instansi Sekolah" <?php if(trim($unit == "Instansi Sekolah")) echo "selected"; ?> >Instansi Sekolah</option>
                                                    <option value="Instansi Lembaga" <?php if(trim($unit == "Instansi Lembaga")) echo"selected";?> >Instansi Lembaga</option>
                                                    <option value="Instansi Lain" <?php if(trim($unit == "Instansi Lain")) echo"selected"; ?> >Instansi Lain</option>
                                                    
                                                </select><?php // echo"$kondisi";?>
                                            </div> -->
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
                                                    accept=".jpg"
                                                    capture
                                                > <?php if (!empty($filegambar)): ?>
                                                <input type="hidden" name="filegambar_lama" value="<?php echo $filegambar; ?>">
                                                
                                            <?php endif; ?>
                                            </div>
                                                <div>
                                                    <button id="" type="submit" class="btn btn-lg btn-info btn-block" name="<?php echo $button; ?>">
                                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                        <span id="">Simpan Data</span>
                                                        
                                                    </button>
                                                </div>
     
     </form>
                        
                         <!--  update
                           <p class="mt-2">Gambar saat ini: <?php //echo $filegambar; ?> <br> 
                          <img src="image/<?php //echo $filegambar; ?>" style="max-width: 200px;" alt="Gambar saat ini"></p>
                        -->
                        
                    
        </div>
     
	</div>
    
</div>

</body>
</html>
