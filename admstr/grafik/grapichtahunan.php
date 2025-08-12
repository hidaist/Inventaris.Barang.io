<?php
include_once "../librari/inc.koneksi.php";

$data_jml_total_barang_tahunan = array();
$data_jml_total_barang_bulanan = array();

// Ambil data tahunan
$bulan_labels = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$tahun = date('Y');
for ($bulan = 1; $bulan <= 12; $bulan++) {
    $sql_harga_barang_bulan = "SELECT SUM(harga_barang) AS total_harga_barang FROM barang WHERE MONTH(date_pembelian) = $bulan AND YEAR(date_pembelian) = $tahun";
    $result = mysqli_query($koneksi, $sql_harga_barang_bulan);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    $row = mysqli_fetch_assoc($result);
    $total_harga_bulan = $row['total_harga_barang'];

    if (empty($total_harga_bulan)) {
        $total_harga_bulan = 0;
    }

    $data_jml_total_barang_bulanan[$bulan_labels[$bulan - 1]] = $total_harga_bulan;
}

// Ambil data 5 tahunan
$tahun_sekarang = date('Y');
$tahun_terakhir = $tahun_sekarang - 9;

for ($tahun = $tahun_terakhir; $tahun <= $tahun_sekarang; $tahun++) {
    $sql_harga_barang_tahun = "SELECT SUM(harga_barang) AS total_harga_barang FROM barang WHERE YEAR(date_pembelian) = $tahun";
    $result = mysqli_query($koneksi, $sql_harga_barang_tahun);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    $row = mysqli_fetch_assoc($result);
    $total_harga_tahun = $row['total_harga_barang'];

    if (empty($total_harga_tahun)) {
        $total_harga_tahun = 0;
    }

    $data_jml_total_barang_tahunan[$tahun] = $total_harga_tahun;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Grafik Pengeluaran Pembelanjaan Barang</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div style="width: 52%; float: left;">
        <canvas id="chartBulanan"></canvas>
    </div>
    <div style="width: 52%; float: left;">
        <canvas id="chartTahunan"></canvas>
    </div>

    <script>
        // Chart untuk Pengeluaran Bulanan
        var ctxBulanan = document.getElementById('chartBulanan').getContext('2d');
        var chartBulanan = new Chart(ctxBulanan, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($bulan_labels); ?>, // Menggunakan label bulan yang sesuai
                datasets: [{
                    label: 'Grafik Belanja Barang Tahun <?php echo $tahun_sekarang; ?>',
                    data: <?php echo json_encode(array_values($data_jml_total_barang_bulanan)); ?>,
                    backgroundColor: 'rgba(150, 15, 0, 0.5)',
                    borderColor: 'rgba(255, 0, 0, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Grafik Aset Tahun <?php echo $tahun; ?>'
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Bulan'
                        }
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Total Pengeluaran'
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1000000, // Sesuaikan ini dengan skala yang Anda inginkan
                            callback: function (value, index, values) {
                                return 'Rp' + value.toLocaleString();
                            }
                        }
                    }]
                }
            }
        });

        // Chart untuk Pengeluaran Tahunan
        var ctxTahunan = document.getElementById('chartTahunan').getContext('2d');
        var chartTahunan = new Chart(ctxTahunan, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_keys($data_jml_total_barang_tahunan)); ?>,
                datasets: [{
                    label: 'Grafik Aset Tahun',
                    data: <?php echo json_encode(array_values($data_jml_total_barang_tahunan)); ?>,
                    backgroundColor: 'rgba(0, 15, 150, 0.5)',
                    borderColor: 'rgba(0, 0, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Grafik Aset Tahunan'
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Tahun'
                        }
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Total Pengeluaran'
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1000000, // Sesuaikan ini dengan skala yang Anda inginkan
                            callback: function (value, index, values) {
                                return 'Rp' + value.toLocaleString();
                            }
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>
