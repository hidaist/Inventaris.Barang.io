
<?php
include_once "../librari/inc.koneksi.php";

$sql_kondisi = "SELECT kondisi_barang, COUNT(*) AS jumlah_barang FROM barang GROUP BY kondisi_barang";

$result = mysqli_query($koneksi, $sql_kondisi);

if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

$data_jml_total_barang = array(
    'B' => 0,
    'RR' => 0,
    'RB' => 0
);

while ($row = mysqli_fetch_assoc($result)) {
    $kondisi = $row['kondisi_barang'];
    $jumlah_barang = $row['jumlah_barang'];
    $data_jml_total_barang[$kondisi] = $jumlah_barang;
}

// tampilkan data dalam format JSON
$response_data = array(
    'data_jml_total_barang' => $data_jml_total_barang
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Grafik Jumlah Barang Berdasarkan Kondisi</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div style="width: 30%;">
        <canvas id="pie-chart" style="float: left; width: 30%;"></canvas>
        <canvas id="bar-chart" style="float: left; width: 30%;"></canvas>
    </div>

    <script>
    var pieData = <?php echo json_encode(array_values($data_jml_total_barang)); ?>;
    var ctxPie = document.getElementById('pie-chart').getContext('2d');
    var pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ['Baik', 'Rusak Ringan', 'Rusak Berat'],
            datasets: [
                {
                    label: 'Jumlah Barang',
                    data: <?php echo json_encode(array_values($data_jml_total_barang)); ?>,
                    backgroundColor: [
                        'rgba(153, 255, 153, 1)',   // Warna untuk 'Baik'
                        'rgba(255, 255, 153, 1)',   // Warna untuk 'Rusak Ringan'
                        'rgba(255, 153, 153, 1)'   // Warna untuk 'Rusak Berat'
                    ],
                    borderColor: 'rgba(0, 0, 0, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Grafik Jumlah Barang Berdasarkan Kondisi'
            }
        }
    });
    var barData = pieData; // Menggunakan data yang sama dengan grafik lingkaran

    var ctxBar = document.getElementById('bar-chart').getContext('2d');
    var ctxBar = document.getElementById('bar-chart').getContext('2d');
    var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Baik', 'Rusak Ringan', 'Rusak Berat'],
            datasets: [
                {
                    label: 'Jumlah Barang',
                    data: barData,
                    backgroundColor: [
                        'rgba(153, 255, 153, 1)',   // Warna untuk 'Baik'
                        'rgba(255, 255, 153, 1)',   // Warna untuk 'Rusak Ringan'
                        'rgba(255, 153, 153, 1)'   // Warna untuk 'Rusak Berat'
                    ],
                    borderColor: 'rgba(0, 0, 0, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            title: {
                display: true,
                text: 'Grafik Jumlah Barang Berdasarkan Kondisi (Bar Chart)'
            }
        }
    });
    </script>
</body>
</html>
