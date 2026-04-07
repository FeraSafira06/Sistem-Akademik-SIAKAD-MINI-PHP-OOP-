<?php
session_start();

// Inisialisasi
if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = [];
}

// TAMBAH MAHASISWA
if (isset($_POST['tambah'])) {
    $_SESSION['mahasiswa'][] = [
        'nama' => $_POST['nama'],
        'nim' => $_POST['nim'],
        'nilai' => []
    ];
}

// TAMBAH NILAI
if (isset($_POST['tambah_nilai'])) {
    $index = $_POST['index'];

    $_SESSION['mahasiswa'][$index]['nilai'][] = [
        'matkul' => $_POST['matkul'],
        'nilai' => $_POST['nilai']
    ];
}

// HAPUS MAHASISWA
if (isset($_GET['hapus'])) {
    unset($_SESSION['mahasiswa'][$_GET['hapus']]);
    $_SESSION['mahasiswa'] = array_values($_SESSION['mahasiswa']);
}

// FUNGSI HITUNG IPK
function hitungIPK($nilai) {
    if (count($nilai) == 0) return 0;

    $total = 0;
    foreach ($nilai as $n) {
        $total += $n['nilai'];
    }

    return round($total / count($nilai), 2);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SIAKAD MINI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center">SIAKAD MINI</h2>

    <!-- FORM TAMBAH MAHASISWA -->
    <div class="card p-3 mt-4">
        <h4>Tambah Mahasiswa</h4>
        <form method="POST">
            <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
            <input type="text" name="nim" class="form-control mb-2" placeholder="NIM" required>
            <button name="tambah" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <!-- DATA MAHASISWA -->
    <div class="mt-4">
        <?php foreach ($_SESSION['mahasiswa'] as $i => $mhs): ?>
            <div class="card p-3 mb-3">

                <h5><?= $mhs['nama'] ?> (<?= $mhs['nim'] ?>)</h5>
                <p><b>IPK:</b> <?= hitungIPK($mhs['nilai']) ?></p>

                <!-- FORM TAMBAH NILAI -->
                <form method="POST" class="row g-2">
                    <input type="hidden" name="index" value="<?= $i ?>">

                    <div class="col-md-4">
                        <input type="text" name="matkul" class="form-control" placeholder="Mata Kuliah" required>
                    </div>

                    <div class="col-md-3">
                        <input type="number" step="0.01" name="nilai" class="form-control" placeholder="Nilai (0-4)" required>
                    </div>

                    <div class="col-md-3">
                        <button name="tambah_nilai" class="btn btn-success">Tambah Nilai</button>
                    </div>
                </form>

                <!-- LIST NILAI -->
                <ul class="mt-3">
                    <?php foreach ($mhs['nilai'] as $n): ?>
                        <li><?= $n['matkul'] ?> : <?= $n['nilai'] ?></li>
                    <?php endforeach; ?>
                </ul>

                <!-- HAPUS -->
                <a href="?hapus=<?= $i ?>" class="btn btn-danger btn-sm">Hapus Mahasiswa</a>

            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>