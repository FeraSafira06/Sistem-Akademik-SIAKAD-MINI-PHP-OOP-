<?php
session_start();

// ==================
// INISIALISASI
// ==================
if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = [];
}

if (!isset($_SESSION['matkul'])) {
    $_SESSION['matkul'] = [];
}

// ==================
// TAMBAH MAHASISWA
// ==================
if (isset($_POST['tambah'])) {
    $_SESSION['mahasiswa'][] = [
        'nama' => $_POST['nama'],
        'nim' => $_POST['nim'],
        'jurusan' => $_POST['jurusan'],
        'prodi' => $_POST['prodi'],
        'semester' => $_POST['semester'],
        'status' => $_POST['status'],
        'nilai' => []
    ];
}

// ==================
// TAMBAH MATA KULIAH
// ==================
if (isset($_POST['tambah_matkul'])) {
    $_SESSION['matkul'][] = $_POST['nama_matkul'];
}

// ==================
// HAPUS MATA KULIAH
// ==================
if (isset($_GET['hapus_matkul'])) {
    unset($_SESSION['matkul'][$_GET['hapus_matkul']]);
    $_SESSION['matkul'] = array_values($_SESSION['matkul']);
}

// ==================
// TAMBAH NILAI
// ==================
if (isset($_POST['tambah_nilai'])) {
    $index = $_POST['index'];

    $nilai = $_POST['nilai'];
    if ($nilai > 4) $nilai = 4;

    $_SESSION['mahasiswa'][$index]['nilai'][] = [
        'matkul' => $_POST['matkul'],
        'nilai' => $nilai
    ];
}

// ==================
// HAPUS MAHASISWA
// ==================
if (isset($_GET['hapus'])) {
    unset($_SESSION['mahasiswa'][$_GET['hapus']]);
    $_SESSION['mahasiswa'] = array_values($_SESSION['mahasiswa']);
}

// ==================
// HITUNG IPK
// ==================
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

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f4f6f9; }
        .card { border-radius: 10px; }
    </style>
</head>

<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">SIAKAD MINI</h2>

    <!-- FORM MAHASISWA -->
    <div class="card p-4 mb-4">
        <h4>Tambah Mahasiswa</h4>
        <form method="POST">
            <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
            <input type="text" name="nim" class="form-control mb-2" placeholder="NIM" required>
            <input type="text" name="jurusan" class="form-control mb-2" placeholder="Jurusan" required>
            <input type="text" name="prodi" class="form-control mb-2" placeholder="Program Studi" required>
            <input type="text" name="semester" class="form-control mb-2" value="Genap 2026/2027" required>

            <select name="status" class="form-control mb-2">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>

            <button name="tambah" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <!-- MANAJEMEN MATA KULIAH -->
    <div class="card p-4 mb-4">
        <h4>Manajemen Mata Kuliah</h4>

        <form method="POST" class="mb-3">
            <input type="text" name="nama_matkul" class="form-control mb-2" placeholder="Nama Mata Kuliah" required>
            <button name="tambah_matkul" class="btn btn-success">Tambah Mata Kuliah</button>
        </form>

        <ul>
            <?php foreach ($_SESSION['matkul'] as $i => $mk): ?>
                <li>
                    <?= $mk ?>
                    <a href="?hapus_matkul=<?= $i ?>" class="btn btn-danger btn-sm">Hapus</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- DATA MAHASISWA -->
    <?php foreach ($_SESSION['mahasiswa'] as $i => $mhs): ?>
        <div class="card p-4 mb-3">

            <h5><?= $mhs['nama'] ?> (<?= $mhs['nim'] ?>)</h5>

            <p>
                <?= $mhs['jurusan'] ?> - <?= $mhs['prodi'] ?><br>
                Semester: <?= $mhs['semester'] ?><br>
                Status: <b><?= $mhs['status'] ?></b>
            </p>

            <p>
                <b>IPK:</b> 
                <span class="text-success">
                    <?= hitungIPK($mhs['nilai']) ?>
                </span>
            </p>

            <!-- INPUT NILAI -->
            <form method="POST" class="row g-2">
                <input type="hidden" name="index" value="<?= $i ?>">

                <div class="col-md-4">
                    <select name="matkul" class="form-control" required>
                        <option value="">-- Pilih Mata Kuliah --</option>
                        <?php foreach ($_SESSION['matkul'] as $mk): ?>
                            <option value="<?= $mk ?>"><?= $mk ?></option>
                        <?php endforeach; ?>
                    </select>
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

            <!-- TOMBOL -->
            <div class="mt-3">
                <a href="khs.php?index=<?= $i ?>" target="_blank" class="btn btn-primary btn-sm">
                    Cetak KHS
                </a>

                <a href="?hapus=<?= $i ?>" class="btn btn-danger btn-sm">
                    Hapus
                </a>
            </div>

        </div>
    <?php endforeach; ?>

</div>

</body>
</html>