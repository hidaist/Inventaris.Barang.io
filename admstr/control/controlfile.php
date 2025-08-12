<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$file = isset($_GET['control']) ? $_GET['control'] : '';

switch ($file) {
    case 'admincontrol':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/useradmin.control.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'ruangControl':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/ruang.control.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'barangControl':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/barang.control.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'pinjamBarangControl':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/pinjamBarang.control.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'barangKembaliControl':
                        //directory bisa diganti di $ filenya.
                        $file_path = __DIR__ . "/barangKembali.control.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
}
?>
