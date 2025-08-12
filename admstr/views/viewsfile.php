<?php
//include __DIR__. "../../../cek_login.php";
//include "../session_admin.php";

$file = isset($_GET['views']) ? $_GET['views'] : '';

switch ($file) {
    case 'adminviews':
                        $file_path = __DIR__ . "/useradmin.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;

    case 'ruangViews':
                        $file_path = __DIR__ . "/ruang.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'ruangViewsDetail':
                        $file_path = __DIR__ . "/ruangDetail.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'barangViews':
                        $file_path = __DIR__ . "/barang.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'barangDetailViews':
                        $file_path = __DIR__ . "/barangDetail.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'grafiktahunViews':
                        $file_path = __DIR__ . "/graphTahunan.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'grafiKondisiAsetViews':
                        $file_path = __DIR__ . "/graphKondisiAset.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'pinjamBarangViews':
                        $file_path = __DIR__ . "/pinjamBarang.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'prosesKembaliBarangViews':
                        $file_path = __DIR__ . "/pengembalianBarang.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'rekapKembaliBarangViews':
                        $file_path = __DIR__ . "/pengembalianBarangRekap.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'detailBarangBaikViews':
                        $file_path = __DIR__ . "/barangBaikDetail.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'detailBarangRusakRinganViews':
                        $file_path = __DIR__ . "/barangRusakRinganDetail.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;
    case 'detailBarangRusakBeratViews':
                        $file_path = __DIR__ . "/barangRusakBeratDetail.views.php";
                        if (!file_exists($file_path)) {
                            die("data $file_path tidak ada");
                        }
                        include $file_path;
                        break;

}
?>
