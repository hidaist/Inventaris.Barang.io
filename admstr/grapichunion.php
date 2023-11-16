<?php
include_once "../librari/inc.koneksi.php";

$data_jml_total_barang = array();

$bulan_labels = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$tahun = date('Y');
// ambil data dari database untuk setiap bulan
for ($bulan = 1; $bulan <= 12; $bulan++) {
    // Query SQL untuk menghitung jumlah harga_barang per bulan
    $sql_harga_barang_bulan = "SELECT SUM(harga_barang) AS total_harga_barang FROM barang WHERE MONTH(date_pembelian) = $bulan AND YEAR(date_pembelian) = $tahun";


    $result = mysqli_query($koneksi, $sql_harga_barang_bulan);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    $row = mysqli_fetch_assoc($result);
    $total_harga_bulan = $row['total_harga_barang'];

    // Jika tidak ada data untuk bulan tertentu, set total_harga_bulan menjadi 0
    if (empty($total_harga_bulan)) {
        $total_harga_bulan = 0;
    }

    $data_jml_total_barang[$bulan_labels[$bulan - 1]] = $total_harga_bulan;
}

// tampilkan data dalam format JSON
$response_data = array(
    'data_jml_total_barang' => $data_jml_total_barang
);

//header('Content-Type: application/json');
//echo json_encode($response_data);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Grafik Jumlah Harga Barang Bulanan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 80%;">
        <canvas id="chart"></canvas>
    </div>

    <script>
    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($bulan_labels); ?>, // Menggunakan label bulan yang sesuai
            datasets: [
                {
                    label: 'Grafik Belanja Barang Tahun <?php echo $tahun; ?>',
                    data: <?php echo json_encode($data_jml_total_barang); ?>,
                    backgroundColor: 'rgba(0, 15, 150, 58)',
                    borderColor: 'rgba(0, 0, 255, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Grafik Jumlah Harga Barang Bulanan'
            },
            scales: {
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Bulan'
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Total Harga Barang'
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1000 // Ubah ini sesuai dengan skala yang Anda inginkan
                    }
                }]
            }
        }
    });
    </script>

</body>
</html>
