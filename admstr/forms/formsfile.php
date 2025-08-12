<?php

//include __DIR__. "../../cek_login.php";
//include "../../session_admin.php";

?>
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$file = isset($_GET['forms']) ? $_GET['forms'] : '';

switch ($file) {
    case 'admineditforms':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/useradmin.forms.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'ruangForms':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/ruang.forms.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'barangForms':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/barang.forms.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'pinjamBarangForms':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/pinjamBarang.forms.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'barangKembaliForms':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/barangKembali.forms.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;

}
?>
