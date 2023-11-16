<?php
function kdauto($tabel, $inisial){
        $struktur       = mysql_query("SELECT * FROM $tabel");
        $field          = mysql_field_name($struktur,0);
        $panjang        = mysql_field_len($struktur,0);

         $qry        = mysql_query("SELECT max(".$field.") FROM ".$tabel);
         $row        = mysql_fetch_array($qry);
         if ($row[0]=="") {
                 $angka=0;
        }
         else {
                 $angka                = substr($row[0], strlen($inisial));
         }

         $angka++;
         $angka      =strval($angka);
         $tmp        ="";
         for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
                $tmp=$tmp."0";
        }
         return $inisial.$tmp.$angka;
}

// Konvesi dd-mm-yyyy -> yyyy-mm-dd
function tgl_ind_to_eng() {
        $tgl_eng=substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
        return $tgl_eng;
}

// Konvesi yyyy-mm-dd -> dd-mm-yyyy
function tgl_eng_to_ind($tgl) {
        $tgl_ind=substr($tgl,8,2)."-".substr($tgl,5,2)."-".substr($tgl,0,4);
        return $tgl_ind;
}

function format_angka($angka) {
        $hasil =  number_format($angka,0, ",",".");
        return $hasil;
}
?>