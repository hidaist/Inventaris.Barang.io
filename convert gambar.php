<?php


error_reporting(0);
$folder = "images/";
$upload_image = $_FILES['gambar']['name'];
// tentukan ukuran width yang diharapkan
$width_size = 480;

// tentukan di mana image akan ditempatkan setelah diupload
$filesave = $folder . $upload_image;
move_uploaded_file($_FILES['gambar']['tmp_name'], $filesave);

// menentukan nama image setelah dibuat
$resize_image = $folder . "resize_" . uniqid(rand()) . ".jpg";

// mendapatkan ukuran width dan height dari image
list( $width, $height ) = getimagesize($filesave);

// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
$k = $width / $width_size;

// menentukan width yang baru
$newwidth = $width / $k;

// menentukan height yang baru
$newheight = $height / $k;

// fungsi untuk membuat image yang baru
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($filesave);

// men-resize image yang baru
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// menyimpan image yang baru
imagejpeg($thumb, $resize_image);

imagedestroy($thumb);
imagedestroy($source);

?>