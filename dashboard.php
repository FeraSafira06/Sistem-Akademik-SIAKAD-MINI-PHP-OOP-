<?php
session_start();
if(!isset($_SESSION['login'])) header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body {
    font-family: 'Poppins', sans-serif;
    margin:0;
    background:#f3f4f6;
}

.container { display:flex; }

/* SIDEBAR */
.sidebar {
    width:240px;
    background:#0f172a;
    color:white;
    height:100vh;
    padding:20px;
}

.sidebar a {
    display:block;
    color:#94a3b8;
    padding:12px;
    border-radius:10px;
    text-decoration:none;
}

.sidebar a:hover {
    background:#7c3aed;
    color:white;
}

/* MAIN */
.main { flex:1; padding:25px; }

/* WELCOME */
.welcome {
    background:#d6a85f;
    padding:20px;
    border-radius:20px;
    display:flex;
    justify-content:space-between;
    color:white;
}

.avatar {
    width:70px;
    height:70px;
    border-radius:50%;
    background:#ccc;
}

/* STATS */
.stats {
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:15px;
    margin-top:20px;
}

.stat-card {
    padding:15px;
    border-radius:15px;
    text-align:center;
    color:white;
}

/* WARNA SESUAI REQUEST */
.mhs { background:#22c55e; } /* hijau */
.dosen { background:#7c3aed; } /* ungu */
.mk { background:#ef4444; } /* merah */
.kelas { background:#eab308; } /* kuning */

/* GRID */
.grid {
    display:flex;
    gap:20px;
    margin-top:20px;
}

.left { flex:2; }
.right { flex:1; }

.card {
    background:white;
    padding:20px;
    border-radius:20px;
    margin-bottom:20px;
}

.list li { margin-bottom:10px; }

/* CHART KECIL */
.chart-box {
    width:250px;
    margin:auto;
}
</style>
</head>

<body>

<div class="container">

<!-- SIDEBAR -->
<?php include 'sidebar.php'; ?>

<div class="main">

<!-- WELCOME -->
<div class="welcome">
    <div>
        <h3>Welcome back, <?= $_SESSION['nama'] ?></h3>
        <p>IPK kamu saat ini: <b>3.75</b></p>
    </div>

    <!-- FOTO SILUET -->
    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="avatar">
</div>

<!-- STATS -->
<div class="stats">
    <div class="stat-card mhs">
        <h3>140</h3>
        <p>Mahasiswa</p>
    </div>

    <div class="stat-card dosen">
        <h3>30</h3>
        <p>Dosen</p>
    </div>

    <div class="stat-card mk">
        <h3>40</h3>
        <p>Mata Kuliah</p>
    </div>

    <div class="stat-card kelas">
        <h3>18</h3>
        <p>Kelas</p>
    </div>
</div>

<div class="grid">

<!-- LEFT -->
<div class="left">

    <!-- CHART -->
    <div class="card">
        <h3>Statistik Mahasiswa</h3>
        <div class="chart-box">
            <canvas id="chart"></canvas>
        </div>
    </div>

</div>

<!-- RIGHT -->
<div class="right">

    <!-- AKTIVITAS -->
    <div class="card">
        <h3>My Activity</h3>
        <ul class="list">
            <li>Login sistem</li>
            <li>Cek nilai</li>
            <li>Lihat KHS</li>
        </ul>
    </div>

    <!-- PENGUMUMAN -->
    <div class="card">
        <h3>Pengumuman</h3>
        <ul class="list">
            <li>Ujian minggu depan</li>
            <li>Batas KRS 20 Agustus</li>
        </ul>
    </div>

    <!-- JADWAL (PINDAH KE SINI) -->
    <div class="card">
        <h3>Jadwal Hari Ini</h3>
        <ul class="list">
            <li>Pemrograman Berorientasi Objek (07:30 - 09:00)</li>
            <li>Bahasa Indonesia (09:30 - 11:00)</li>
            <li>Visualisasi Keputusan Bisnis (12:00 - 13:30)</li>
        </ul>
    </div>

</div>

</div>

</div>
</div>

<script>
new Chart(document.getElementById('chart'), {
    type: 'doughnut',
    data: {
        labels: ['Bisnis Digital','Manajemen Agribisnis','Produksi Media'],
        datasets: [{
            data: [70, 40, 30],
            backgroundColor: [
                '#3b82f6', // biru (terbanyak)
                '#f97316', // orange
                '#ec4899'  // pink
            ]
        }]
    },
    options: {
        cutout: '70%'
    }
});
</script>

</body>
</html>