<?php
require_once 'Mahasiswa1.php';
require_once 'matakuliah1.php';

// ambil data
$mhs = Mahasiswa::getAll();
$mk  = MataKuliah::getAll();

// simpan nilai
if(isset($_POST['simpan'])){
    $_SESSION['nilai'][] = [
        "nim"   => $_POST['nim'],
        "kode"  => $_POST['kode'],
        "nilai" => $_POST['nilai']
    ];
}
?>

<div class="card">
<h3>Input Nilai</h3>

<form method="POST">

<select name="nim">
<option>Pilih Mahasiswa</option>
<?php foreach($mhs as $m): ?>
<option value="<?= $m['nim'] ?>">
<?= $m['nama'] ?> (<?= $m['nim'] ?>)
</option>
<?php endforeach; ?>
</select>

<br><br>

<select name="kode">
<option>Pilih Mata Kuliah</option>
<?php foreach($mk as $k): ?>
<option value="<?= $k['kode'] ?>">
<?= $k['nama'] ?>
</option>
<?php endforeach; ?>
</select>

<br><br>

<input type="number" name="nilai" placeholder="Nilai">

<br><br>

<button name="simpan">Simpan</button>

</form>

</div>