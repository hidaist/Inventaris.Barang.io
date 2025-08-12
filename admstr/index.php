<?php 
// cek session
// cek session sangat penting untuk USER yang ingin masuk/login tanpa proses login.
include "../admstr/session.php";
//cek level
if ($_SESSION['level'] != 'admin') // hanya level admin yang boleh masuk
{
	header ('location:login.php?code=3');
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Inventarisasi</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">
    
    <link rel="stylesheet" href="../vendors/chosen/chosen.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">


    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const searchInput = document.getElementById('search-input');
                    const itemsToSearch = document.querySelectorAll('.searchable-item');

                    searchInput.addEventListener('input', function() {
                        const searchText = searchInput.value.toLowerCase();

                        itemsToSearch.forEach(function(item) {
                            const textContent = item.textContent.toLowerCase();
                            if (textContent.includes(searchText)) {
                                item.style.display = 'block';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    });
                });
            </script>
</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo1.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href=""><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Data Users</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>User Admin</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="?page=views&views=adminviews">Users</a></li> 
                            <!-- <li><i class="fa fa-id-badge"></i><a href="?page=views&views=usersviews">Petugas/Pegawai</a></li> -->
                            
                        </ul>
                    </li>
                    <h3 class="menu-title">Data Inventaris</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Inventaris </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-building-o"></i><a href="?page=views&views=ruangViews">Ruang</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="?page=views&views=barangViews">Barang</a></li>
                            
                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart-o"></i>Grafik</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="?page=views&views=grafiktahunViews">Tahunan</a></li>
                            <li><i class="menu-icon fa fa-bar-chart-o"></i><a href="?page=views&views=grafiKondisiAsetViews"> Kondisi Asset</a></li>
                            
                        </ul>
                    </li>
                    <!-- <li class="menu-item-has-children dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-folder-open"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                           <li><i class="menu-icon fa fa-book"></i><a href="?page=laporanbarangbulan">Pengeluaran Bulanan </a></li> 
                            <li><i class="menu-icon fa fa-book"></i><a href="?page=laporanbarangtahun">Tahunan </a></li>
                            
                        </ul>
                    </li> -->

                    <h3 class="menu-title">Peminjaman Barang</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Peminjam Barang </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-users"></i><a href="?page=views&views=pinjamBarangViews">Peminjam Barang</a></li>
                            <li><i class="fa fa-gears"></i><a href="?page=views&views=prosesKembaliBarangViews">Proses Pengembalian </a></li>
                            <li><i class="fa fa-table"></i><a href="?page=views&views=rekapKembaliBarangViews">Rekap Barang </a></li>
                            
                        </ul>
                    </li>
                    <!-- 
                    <h3 class="menu-title">Data Table</h3>/.menu-title
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="">Data Table</a></li>
                            <li><i class="fa fa-table"></i><a href="">Data Table</a></li>
                        </ul>
                    </li>
                     -->
                </ul>
                   
            </div><!-- /.navbar-collapse -->
        </nav>
        <?php include_once "spcont.php"; ?>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel ">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">
            
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search" id="search-input">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                        <!--
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div>
                        -->
                        
                    </div>
                </div>
                
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>
                            <!--
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>
                            -->
                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    

                </div>
            </div>
                
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="content mt-3">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
             

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                    </div>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
             

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
             </div> -->
             
            <!--/.col-->
            
            <div class="col-lg-12 col-md-6 searchable-item">
                <div class="card bg-flat-color-1 text-light">
                    <i class="media-body"></i>
                            <span class="media-body" align="center"> &nbsp; Selamat Datang di SIS </span>
                <!--/media body Panggil untuk membuka File PHP dari bukafile.php chookie di kirim dari link ahref-->
                    <div class="col-lg-12 card"> <span class="text-dark" > <?php include  "opendir.php"; ?> </span>
                    </div>   
                </div>
            </div>
            
            
            <div class="col-xl-3 col-lg-6 searchable-item">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one"><a href='?page=views&views=detailBarangBaikViews'>
                            <div class="stat-icon dib"><i class="fa fa-cogs bg-flat-color-5  float-left text-light"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Barang Baik</div>
                                <div class="stat-digit"><?php 
							    include_once "../librari/inc.koneksi.php";
							    $sql = mysqli_query($koneksi,"SELECT * FROM barang where kondisi_barang='B' ");
 							    $jumlah = mysqli_num_rows($sql); 
                                echo "$jumlah"; ?>
                                    </div>
                            </div>
                        </div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one"><a href='?page=views&views=detailBarangRusakRinganViews'>
                            <div class="stat-icon dib"><i class="fa fa-cogs text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Rusak Ringan</div>
                                <div class="stat-digit">
                                <?php 
							    include_once "../librari/inc.koneksi.php";
							    $sql = mysqli_query($koneksi,"SELECT * FROM barang where kondisi_barang='RR'");
 							    $jumlah = mysqli_num_rows($sql); 
                                 echo "$jumlah";?>
                                   
                                </div>
                            </div>
                        </div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one"><a href='?page=views&views=detailBarangRusakBeratViews'>
                            <div class="stat-icon dib"><i class="fa fa-cogs bg-danger text-light"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text"> Rusak Berat</div>
                                <div class="stat-digit"><?php 
							    include_once "../librari/inc.koneksi.php";
							    $sql = mysqli_query($koneksi,"SELECT * FROM barang where kondisi_barang='RB'");
 							    $jumlah = mysqli_num_rows($sql); 
                                 echo "$jumlah";?></div>
                            </div>
                        </div></a>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one"><a href='?page=views&views=barangViews'>
                            <div class="stat-icon dib"><i class="fa fa-moon-o bg-warning  float-left text-light"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text"> Total Asset</div>
                                <div class="stat-digit"><?php 
							    include_once "../librari/inc.koneksi.php";
							    $sql = mysqli_query($koneksi,"SELECT * FROM barang");
 							    $jumlah = mysqli_num_rows($sql); 
                                echo "$jumlah"; ?></div>
                            </div>
                        </div>
                    </div></a>
                </div>
            </div>

            <div class="card col-lg-6">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4"><a href='?page=views&views=ruangViews'>
                        <i class="fa fa-building"></i>
                    </div>
                    <div class="h4 mb-0"> <?php include_once "../librari/inc.koneksi.php";
                                    
                                    $sql = mysqli_query($koneksi, "SELECT * FROM ruang");
                                    $jumlah = mysqli_num_rows($sql);
                                    echo "$jumlah"; ?></div>
                    <small class="text-muted text-uppercase font-weight-bold">Jumlah Ruang</small></a>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 100%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-6">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <div class="h4 mb-0"> <?php 
                                date_default_timezone_set('Asia/Jakarta');
                                echo date('l, d-M-Y');
                               ?></div>
                    <small class="text-muted text-uppercase font-weight-bold">Date</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 100%; height: 5px;"></div>
                </div>
            </div>

            <!-- Side Bawah Informasi table -->
            <div class="col-lg-6 float-left">
                        <div class="card">
                            <div class="card-header">
                              <center>  <strong class="card-title">Daftar Barang</strong></center>
                            </div>
                            <div class="card-body">
                            <table class="table" id="myTable1" class="responsive">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Kondisi</th>
                                            <th scope="col">Jumlah</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php include_once "../librari/inc.koneksi.php";
                                    
                                    $sqlinfobarang = mysqli_query($koneksi, "SELECT nm_barang, kondisi_barang, COUNT(*) as jumlah FROM barang GROUP BY nm_barang, kondisi_barang");
                                    ?>
                                    <tbody>
                                    <?php $no=0;
                                    while($datainfobarang = mysqli_fetch_array($sqlinfobarang)) {
                                        $no++;
                                                                              
                                echo "<tr>" ;
                                    
                                    echo "<td>" .$no. "</td>" ;
                                    echo "<td>" .$datainfobarang['nm_barang']. "</td>" ;
                                    echo "<td>" .($datainfobarang['kondisi_barang'] == 'B' ? 'Baik' : ($datainfobarang['kondisi_barang'] == 'RR' ? 'Rusak Ringan' : 'Rusak Berat')). "</td>" ;
                                    echo "<td>" .$datainfobarang['jumlah']. "</td>" ;
                                echo "</tr>" ;
                            }?>
                                 <!--   <tr>
                                        <td colspan="2"> Jumlah total barang </td>
                                        <td> <?php /*
                                        $sqlcountbarang = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM barang");
                                        $datacountbarang = mysqli_fetch_array($sqlcountbarang);
                                        echo $datacountbarang['jumlah']; */?> </td>
                                    </tr> -->    
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 float-left">
                        <div class="card">
                            <div class="card-header">
                              <center>  <strong class="card-title">Daftar Pinjam Barang</strong></center>
                            </div>
                            <div class="card-body">
                            <table class="table" id="myTable2" class="responsive">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama Peminjam</th>
                                            <th scope="col">Barang</th>
                                            <th scope="col">Tgl Pinjam</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php include_once "../librari/inc.koneksi.php";
                                    
                                    $sqlpeminjambarang = mysqli_query($koneksi, "SELECT barang.*, barang_pinjam.*
                                        FROM barang_pinjam
                                        LEFT JOIN barang ON barang_pinjam.kd_barang = barang.kd_barang
                                        LEFT JOIN barang_kembali ON barang_pinjam.kd_pinjam = barang_kembali.kd_pinjam
                                        WHERE barang_kembali.kd_pinjam IS NULL");
                                    ?>
                                    <tbody>
                                    <?php $no=0;
                                    while($datapeminjambarang = mysqli_fetch_array($sqlpeminjambarang)) {
                                        $no++;
                                                                              
                                echo "<tr>" ;
                                    
                                    echo "<td>" .$no. "</td>" ;
                                    echo "<td>" .$datapeminjambarang['nm_peminjam']. "</td>" ;
                                    echo "<td>" .$datapeminjambarang['nm_barang']. "</td>" ;
                                    echo "<td>" .$datapeminjambarang['date_pinjam']. "</td>" ;
                                echo "</tr>" ;
                            }?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

             <!-- .content -->
        
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="../assets/js/widgets.js"></script>
    <script src="../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="../assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../assets/js/init-scripts/chart-js/chartjs-init.js"></script> 
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/chosen/chosen.jquery.min.js"></script>
    
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial' 
            });
        })(jQuery);
    </script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
     <!--  Chart js -->
    
    <!-- pagination -->

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        // Inisialisasi DataTables dengan paging
        $('#myTable1').DataTable({
            paging: true, // Aktifkan paging
            lengthMenu: [5, 10, 25, 50], // Tampilkan opsi jumlah data per halaman
            pageLength: 5 // Atur jumlah data per halaman menjadi 5
        });
        $('#myTable2').DataTable({
            paging: true, // Aktifkan paging
            lengthMenu: [5, 10, 25, 50], // Tampilkan opsi jumlah data per halaman
            pageLength: 5 // Atur jumlah data per halaman menjadi 5
        });
    });
</script>
    
     
       

</body>

</html>
