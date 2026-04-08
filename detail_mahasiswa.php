<?php
session_start();
require_once 'Mahasiswa1.php';

$m = Mahasiswa::getByNim($_GET['nim']);
?>