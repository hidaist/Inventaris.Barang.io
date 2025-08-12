<?php

//bulan sekarang
$month=date("m");
//Tahun sekarang
$year=date("Y");
//hari ini
$day=date("d");
//cek jumlah hari tahun sekarang
$endDate=date("t",mktime(0,0,0,$month,$day,$year));
//style untuk table



//table untuk menulis hari
echo '
<table align="center" border="0" width="40%" cellpadding=2 cellspacing=5 style="border:0px solid #CCCCCC">
<tr>
	<td colspan=7 align=center> <b>'; echo date("d M Y");
	
echo'</b><hr>
	</td>
</tr>
<tr>
<td align=center><font color=red>Mg</font></td>
<td align=center>Sn</td>
<td align=center>Sl</td>
<td align=center>Rb</td>
<td align=center>Km</td>
<td align=center>Jm</td>
<td align=center><font color=blue>Sb</font></td>

</tr>
';
/*
mengecek tanggal 1 bulan sekarang ada pada hari ke berapa
kemudian tambahkan cell td sebanyak var $s
*/
$s=date ("w", mktime (0,0,0,$month,1,$year));
for ($ds=1;$ds<=$s;$ds++) {
echo "<td style=\"font-family:arial;color:#B3D9FF\" width=\"20%\" align=center valign=middle bgcolor=\"#FFFFFF\">
</td>";
}
//memulai penulisan tanggal
for ($d=1;$d<=$endDate;$d++) {

//jika nilai $d (tanggal) adalah hari minggu (0) dibuat baris baru <tr>
if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }

//default warna huruf
$fontColor="#000000";
//jika tanggal adalah hari minggu warna huruf merah

if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }

//jika tanggal adalah hari sabtu warna huruf biru
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sat") { $fontColor="blue"; }

if (date("d m Y",mktime (0,0,0,$month,$d,$year)) == date("d m Y")) { $fontColor="aqua"; }




//menulis tanggal
echo "<td style=\"font-family:arial;color:#333333\" width=\"20%\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>";
//jika tanggal adalah hari sabtu (6) akhiri baris </tr>
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }
}
//akhir table

echo '</table>';
?>