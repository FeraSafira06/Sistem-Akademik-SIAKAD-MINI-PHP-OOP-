<?php
session_start();
require_once 'matakuliah1.php';

$edit = false;
if(isset($_GET['kode'])){
    $edit = true;
    $m = MataKuliah::getByKode($_GET['kode']);
}

if(isset($_POST['simpan'])){
    $data = [
        "kode"=>$_POST['kode'],
        "nama"=>$_POST['nama'],
        "sks"=>$_POST['sks'],
        "semester"=>$_POST['semester'],
        "jurusan"=>$_POST['jurusan']
    ];

    if($edit){
        MataKuliah::update($_GET['kode'],$data);
    } else {
        MataKuliah::tambah($data);
    }

    header("Location: matakuliah.php");
}
?>

<h2><?= $edit ? "Edit" : "Tambah" ?> Mata Kuliah</h2>

<form method="POST">
<input name="kode" placeholder="Kode" value="<?= $m['kode'] ?? '' ?>"><br>
<input name="nama" placeholder="Nama Mata Kuliah" value="<?= $m['nama'] ?? '' ?>"><br>
<input name="sks" placeholder="SKS" value="<?= $m['sks'] ?? '' ?>"><br>
<input name="semester" placeholder="Semester" value="<?= $m['semester'] ?? '' ?>"><br>
<input name="jurusan" placeholder="Jurusan" value="<?= $m['jurusan'] ?? '' ?>"><br>

<button name="simpan">Simpan</button>
</form>