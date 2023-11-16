<?php
/* berisi file php yang akan di panggil di index.php silahkan kalau mau ditambah atau di hapus */
error_reporting(0);
switch ($_GET['page']){	
	
	case 'lihatruang' 	: if(!file_exists ("ruangtampil.php")) 
						 	die ("File ruang tidak ada"); 
							include "ruangtampil.php";
							break ;
	case 'tambahruang' 	: if(!file_exists ("ruangtambah.php")) 
						 	die ("File tambah ruang tidak ada"); 
							include "ruangtambah.php";
							break ;
	case 'hapusruang' 	: if(!file_exists ("ruanghapus.php")) 
						 	die ("File hapus ruang tidak ada"); 
							include "ruanghapus.php";
							break ;
	case 'editruang' 	: if(!file_exists ("ruangedit.php")) 
						 	die ("File edit ruang tidak ada"); 
							include "ruangedit.php";
							break ;
	case 'detailruang' 	: if(!file_exists ("ruangdetail.php")) 
						 	die ("File detail ruang tidak ada"); 
							include "ruangdetail.php";
							break ;											
	case 'lihatbarang' 	: if(!file_exists ("barangtampil.php")) 
						 	die ("File barang tidak ada"); 
							include "barangtampil.php";
							break ;
	case'detailbaranglayak' : if(!file_exists("baranglayakdetail.php"))
							die ("barang layak detail tidak ada");
							include "baranglayakdetail.php";
							break;
	case'detailbarangtidaklayak' : if(!file_exists("barangtidaklayakdetail.php"))
							die ("barang tidak layak detail tidak ada");
							include "barangtidaklayakdetail.php";
							break;
	case 'tambahbarang' 	: if(!file_exists ("barangtambah.php")) 
						 	die ("File barang tidak ada"); 
							include "barangtambah.php";
							break ;
	case 'hapusbarang' 	: if(!file_exists ("baranghapus.php")) 
						 	die ("File hapus barang tidak ada"); 
							include "baranghapus.php";
							break ;
	case 'editbarang' 	: if(!file_exists ("barangedit.php")) 
						 	die ("File edit barang tidak ada"); 
							include "barangedit.php";
							break ;
	case 'detailbarang' 	: if(!file_exists ("barangdetail.php")) 
						 	die ("File detail barang tidak ada"); 
							include "barangdetail.php";
							break ;
	case 'detailbarangrusak' 	: if(!file_exists ("barangrusakdetail.php")) 
						 	die ("File detail barang rusak tidak ada"); 
							include "barangrusakdetail.php";
							break ;
	case 'lihatuseradmin' 	: if(!file_exists ("useradmintampil.php")) 
							die ("File tidak ada"); 
						   include "useradmintampil.php";
						   break ;
	case 'tambahuseradmin' 	: if(!file_exists ("useradmintambah.php")) 
							die ("File  tidak ada"); 
						  	include "useradmintambah.php";
						  	break ;
	case 'hapususeradmin' 	: if(!file_exists ("useradminhapus.php")) 
							die ("File  tidak ada"); 
						  	include "useradminhapus.php";
						  	break ;
	case 'edituseradmin' 	: if(!file_exists ("useradminedit.php")) 
							die ("File  tidak ada"); 
						  	include "useradminedit.php";
						  	break ;
	
	case 'tampiluser' 	: if(!file_exists ("userptampil.php")) 
							  die ("File  tidak ada"); 
								include "userptampil.php";
								break ;
	case 'tambahuserp' 	: if(!file_exists ("userptambah.php")) 
								die ("File  tidak ada"); 
								  include "userptambah.php";
								  break ;
	case 'hapususerp' 	: if(!file_exists ("userphapus.php")) 
								die ("File  tidak ada"); 
								  include "userphapus.php";
								  break ;
	case 'detailuserp' 	: if(!file_exists ("userpdetail.php")) 
								die ("File  tidak ada"); 
								  include "userpdetail.php";
								  break ;
	case 'edituserp' 	: if(!file_exists ("userpedit.php")) 
								die ("File  tidak ada"); 
								  include "userpedit.php";
								  break ;
	case 'resetuserp' 	: if(!file_exists ("userpresetpass.php")) 
								die ("File  tidak ada"); 
								  include "userpresetpass.php";
								  break ;
	case 'tampilgrafikbulanan' 	: if(!file_exists ("grapichunion.php")) 
								die ("File  tidak ada"); 
								  include "grapichunion.php";
								  break ;
	case 'tampilgrafikkondisiasset' 	: if(!file_exists ("grapichkondisiasset.php")) 
								die ("File  tidak ada"); 
								  include "grapichkondisiasset.php";
								  break ;
	case 'barangpinjam' 	: if(!file_exists ("pinjambarangtampil.php")) 
								die ("File  tidak ada"); 
								  include "pinjambarangtampil.php";
								  break ;
	case 'barangpinjamtambah' 	: if(!file_exists ("pinjambarangtambah.php")) 
								die ("File  tidak ada"); 
								  include "pinjambarangtambah.php";
								  break ;
	case 'barangpinjamedit' 	: if(!file_exists ("pinjambarangedit.php")) 
								die ("File  tidak ada"); 
								  include "pinjambarangedit.php";
								  break ;
	case 'barangpinjamhapus' 	: if(!file_exists ("pinjambaranghapus.php")) 
								die ("File  tidak ada"); 
								  include "pinjambaranghapus.php";
								  break ;
	case 'barangkembali' 	: if(!file_exists ("pengembalianbarang.php")) 
								die ("File  tidak ada"); 
								  include "pengembalianbarang.php";
								  break ;
	case 'lihatbarangkembali' 		: if(!file_exists ("pengembalianbarangtampil.php")) 
								die ("File  tidak ada"); 
								  include "pengembalianbarangtampil.php";
								  break ;
	case 'lappengembalian' 		: if(!file_exists ("rekappengembalianbarang.php")) 
								die ("File  tidak ada"); 
								  include "rekappengembalianbarang.php";
								  break ;
	case 'prosesbarangkembali' 		: if(!file_exists ("pengembalianprosestampil.php")) 
								die ("File  tidak ada"); 
								  include "pengembalianprosestampil.php";
								  break ;
	case 'laporanbarangbulan' 		: if(!file_exists ("laporanbulanbarang.php")) 
								die ("File  tidak ada"); 
								  include "laporanbulanbarang.php";
								  break ;
	case 'laporanbulandetail' 		: if(!file_exists ("laporanbulandetailbarang.php")) 
								die ("File  tidak ada"); 
								  include "laporanbulandetailbarang.php";
								  break ;
}
?>