<?php
// Mulai sesi
session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Sertakan file koneksi
include 'koneksi.php';

// Query untuk mendapatkan data kategori
$sql_categories = "SELECT categories, COUNT(*) AS count FROM tb_categories GROUP BY categories";
$result_categories = mysqli_query($koneksi, $sql_categories);

// Menyimpan data untuk diagram lingkaran
$data_categories = [];
$total_categories = 0;
while ($row = mysqli_fetch_assoc($result_categories)) {
    $data_categories[$row['categories']] = $row['count'];
    $total_categories += $row['count'];
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/icon.png">
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">WisataSumba</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="categories/categories.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Wisata</span>
                </a>
            </li>
            <li>
                <a href="akomodasi/akomodasi.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Akomodasi</span>
                </a>
            </li>
            <li>
                <a href="transaction/transaction.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Transaction</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">Wisata Admin</span>
            </div>
        </nav>

        <div class="home-content">
            <h2 id="text">
                <?php echo $_SESSION ['username']; ?>
            </h2>
            <h3 id="date"></h3>
        </div>

        <!-- Container untuk widget dan diagram -->
        <div class="dashboard-widget-container">
            <!-- Widget jumlah kategori -->
            <div class="dashboard-widget">
    <h3>Total Kategori</h3>
    <p class="widget-number">
        <span class="total-value"><?php echo $total_categories; ?></span>
    </p>
</div>
            <!-- Diagram lingkaran -->
			<div class="dashboard-chart">
    <h3>Diagram Lingkaran Kategori</h3>
    <canvas id="categoryChart" width="150" height="150"></canvas>

</div>

<style>
    .dashboard-chart {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-top: 20px;
    }

    #categoryChart {
        width: 150px; /* Atur ukuran kecil */
        height: 150px;
        max-width: 100%; /* Responsif */
        max-height: 100%;
    }

</style>

    </section>

    <script>
        window.onload = function () {
    // Menampilkan waktu dan hari
    function myFunction() {
        const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        let date = new Date();
        let jam = date.getHours();
        let tanggal = date.getDate();
        let hari = days[date.getDay()];
        let bulan = months[date.getMonth()];
        let tahun = date.getFullYear();
        let m = checkTime(date.getMinutes());
        let s = checkTime(date.getSeconds());
        document.getElementById("date").innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
        requestAnimationFrame(myFunction);
    }

    function checkTime(i) {
        return i < 10 ? "0" + i : i;
    }

    // Menampilkan kata "Selamat"
    function greetUser() {
        const hours = new Date().getHours();
        let greeting = "";
        if (hours >= 4 && hours <= 10) {
            greeting = "Selamat Pagi, ";
        } else if (hours >= 11 && hours <= 14) {
            greeting = "Selamat Siang, ";
        } else if (hours >= 15 && hours <= 18) {
            greeting = "Selamat Sore, ";
        } else {
            greeting = "Selamat Malam, ";
        }

        // Menambahkan greeting ke elemen #text
        const textElement = document.getElementById("text");
        if (textElement) {
            textElement.insertAdjacentText("afterbegin", greeting);
        }
    }

    // Jalankan fungsi
    greetUser();
    myFunction();

    // Konfigurasi Chart.js (tidak diubah)
    const dataCategories = <?php echo json_encode($data_categories); ?>;
    const labels = Object.keys(dataCategories);
    const data = Object.values(dataCategories);
    const ctx = document.getElementById('categoryChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Kategori',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
			maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top'
                }
            }
        }
    });
};

    </script>
</body>

</html>

