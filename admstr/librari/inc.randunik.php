<?php
function RandUnik($panjang) { 
   $pstring = "0123456789"; 
   $plen = strlen($pstring); 
      for ($i = 1; $i <= $panjang; $i++) { 
          $start = rand(0,$plen); 
          $unik.= substr($pstring, $start, 1); 
      } 

    return $unik; 
} 
?>
 