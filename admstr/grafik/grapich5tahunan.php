<?php
include_once "../librari/inc.koneksi.php";

$data_jml_total_barang = array();

$bulan_labels = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$tahun_sekarang = date('Y');
$tahun_terakhir = $tahun_sekarang - 4; // Mengambil data 5 tahun terakhir

// ambil data dari database untuk setiap bulan
for ($tahun = $tahun_terakhir; $tahun <= $tahun_sekarang; $tahun++) {
    // Query SQL untuk menghitung jumlah harga_barang per bulan
    $sql_harga_barang_tahun = "SELECT SUM(harga_barang) AS total_harga_barang FROM barang WHERE YEAR(date_pembelian) = $tahun";

    $result = mysqli_query($koneksi, $sql_harga_barang_tahun);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }

    $row = mysqli_fetch_assoc($result);
    $total_harga_tahun = $row['total_harga_barang'];

    // Jika tidak ada data untuk tahun tertentu, set total_harga_tahun menjadi 0
    if (empty($total_harga_tahun)) {
        $total_harga_tahun = 0;
    }

    $data_jml_total_barang[$tahun] = $total_harga_tahun;
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
    <title>Grafik Pengeluaran 5 Tahunan</title>
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
                labels: <?php echo json_encode(array_keys($data_jml_total_barang)); ?>,
                datasets: [{
                    label: 'Grafik Pengeluaran Tahunan',
                    data: <?php echo json_encode(array_values($data_jml_total_barang)); ?>,
                    backgroundColor: 'rgba(0, 15, 150, 0.5)',
                    borderColor: 'rgba(0, 0, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Grafik Pengeluaran Tahunan'
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
