<?php
session_start();

// Fungsi hitung IPK
function hitungIPK($nilai) {
    if (count($nilai) == 0) return 0;

    $total = 0;
    foreach ($nilai as $n) {
        $total += $n['nilai'];
    }

    return round($total / count($nilai), 2);
}

// Ambil data mahasiswa
$index = $_GET['index'];
$mhs = $_SESSION['mahasiswa'][$index];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak KHS</title>

    <style>
        body {
            font-family: Arial;
            padding: 30px;
        }

        .center {
            text-align: center;
        }

        .line {
            border-top: 2px solid black;
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: center;
        }

        .info td {
            border: none;
            text-align: left;
            padding: 4px;
        }
    </style>
</head>

<body onload="window.print()">

<!-- HEADER -->
<div class="center">
    <h4>KEMENTRIAN PENDIDIKAN TINGGI, SAINS, DAN TEKNOLOGI</h4>
    <p>Jl. Mastrip PO.BOX 164 Telp 333532 - 333534 Fax 333531 Jember 68101</p>
</div>

<div class="line"></div>

<!-- JUDUL -->
<div class="center">
    <h2 style="margin-bottom:5px;">KARTU HASIL STUDI</h2>
    <h4 style="margin-top:0;">SEMESTER GENAP 2026/2027</h4>
</div>

<br>

<!-- DATA MAHASISWA -->
<table class="info">
    <tr>
        <td width="200">Nama</td>
        <td>: <?= $mhs['nama'] ?></td>
    </tr>
    <tr>
        <td>NIM</td>
        <td>: <?= $mhs['nim'] ?></td>
    </tr>
    <tr>
        <td>Jurusan</td>
        <td>: <?= $mhs['jurusan'] ?></td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td>: <?= $mhs['prodi'] ?></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>: <?= $mhs['status'] ?></td>
    </tr>
</table>

<br>

<!-- TABEL NILAI -->
<table>
    <tr>
        <th>No</th>
        <th>Mata Kuliah</th>
        <th>Nilai</th>
    </tr>

    <?php foreach ($mhs['nilai'] as $i => $n): ?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $n['matkul'] ?></td>
        <td><?= $n['nilai'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<br>

<!-- IPK -->
<h3>IPK: <?= hitungIPK($mhs['nilai']) ?></h3>

<br><br>

<!-- TANDA TANGAN -->
<div style="width: 100%; display: flex; justify-content: flex-end;">
    <div style="text-align: center;">
        <p>Jember, <?= date('d-m-Y') ?></p>
        <br><br><br>
        <p><b>(_____________________)</b></p>
        <p>Dosen Pembimbing</p>
    </div>
</div>

</body>
</html>