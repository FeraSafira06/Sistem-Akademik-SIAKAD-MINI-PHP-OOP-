<?php
session_start();
require_once 'Mahasiswa1.php';

$edit = false;
if(isset($_GET['nim'])){
    $edit = true;
    $m = Mahasiswa::getByNim($_GET['nim']);
}

if(isset($_POST['simpan'])){
    $data = [
        "nim"=>$_POST['nim'],
        "nama"=>$_POST['nama'],
        "jk"=>$_POST['jk'],
        "tgl"=>$_POST['tgl'],
        "jurusan"=>$_POST['jurusan'],
        "angkatan"=>$_POST['angkatan']
    ];

    if($edit){
        Mahasiswa::update($_GET['nim'],$data);
    } else {
        Mahasiswa::tambah($data);
    }

    header("Location: mahasiswa.php");
}
?>