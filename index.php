<?php
session_start();
if(!isset($_SESSION['login'])) header("Location: login.php");

$page = $_GET['page'] ?? 'dashboard';
?>

<!DOCTYPE html>
<html>
<head>
<title>SIAKAD</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<?php include 'sidebar.php'; ?>

<div class="main">

<?php
if($page == 'mahasiswa'){
    include 'mahasiswa.php';

} elseif($page == 'matakuliah'){
    include 'matakuliah.php';

} elseif($page == 'profil'){
    include 'profil.php';

} elseif($page == 'nilai'){
    include 'inputnilai.php';

} elseif($page == 'ipk'){
    include 'ipk.php';

} elseif($page == 'khs'){
    include 'khs.php';

} else {
?>

<!-- DASHBOARD ESTETIK -->
<div class="dashboard">

<h2 class="title">Dashboard</h2>

<!-- WELCOME -->
<div class="welcome-card">
    <div>
        <h3>Welcome back, Fera Safira!</h3>
        <p>Sistem Akademik siap membantu aktivitasmu</p>
        <button class="btn">Lihat Profil</button>
    </div>
    <div class="profile-img"></div>
</div>

<!-- STAT -->
<div class="stats">
    <div class="stat green">140<br><span>Mahasiswa</span></div>
    <div class="stat purple">30<br><span>Dosen</span></div>
    <div class="stat red">40<br><span>Mata Kuliah</span></div>
    <div class="stat yellow">18<br><span>Kelas</span></div>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- LEFT -->
    <div class="left">

        <div class="card">
            <h4>Statistik Jurusan</h4>
            <div class="circle"></div>
            <ul>
                <li>Bisnis Digital (terbanyak)</li>
                <li>Manajemen Agribisnis</li>
                <li>Produksi Media</li>
            </ul>
        </div>

    </div>

    <!-- RIGHT -->
    <div class="right">

        <div class="card">
            <h4>Pengumuman</h4>
            <p>📢 Ujian minggu depan</p>
            <p>📢 Pembayaran segera</p>
            <p>📢 Deadline KRS</p>
        </div>

        <div class="card">
            <h4>Jadwal Hari Ini</h4>
            <p>PBO (07:30 - 09:00)</p>
            <p>Bahasa Indonesia (09:30 - 11:00)</p>
            <p>VKB (12:00 - 13:30)</p>
        </div>

    </div>

</div>

</div>

<?php } ?>

</div>
</div>

</body>
</html>