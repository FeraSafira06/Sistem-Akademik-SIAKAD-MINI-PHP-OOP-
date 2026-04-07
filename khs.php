<?php
session_start();

function hitungIPK($nilai) {
    if (count($nilai) == 0) return 0;
    $total = 0;
    foreach ($nilai as $n) {
        $total += $n['nilai'];
    }
    return round($total / count($nilai), 2);
}

$index = $_GET['index'];
$mhs = $_SESSION['mahasiswa'][$index];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak KHS</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; }
    </style>
</head>

<body onload="window.print()">

<h2>KARTU HASIL STUDI (KHS)</h2>
<hr>

<p>Nama: <?= $mhs['nama'] ?></p>
<p>NIM: <?= $mhs['nim'] ?></p>

<table border="1" cellpadding="10">
    <tr>
        <th>Mata Kuliah</th>
        <th>Nilai</th>
    </tr>

    <?php foreach ($mhs['nilai'] as $n): ?>
    <tr>
        <td><?= $n['matkul'] ?></td>
        <td><?= $n['nilai'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<h3>IPK: <?= hitungIPK($mhs['nilai']) ?></h3>

</body>
</html>