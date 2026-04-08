<?php
session_start();
require_once 'matakuliah1.php';

MataKuliah::hapus($_GET['kode']);
header("Location: matakuliah.php");