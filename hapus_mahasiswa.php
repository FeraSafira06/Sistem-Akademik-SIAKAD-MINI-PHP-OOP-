<?php
session_start();
require_once 'Mahasiswa1.php';

Mahasiswa::hapus($_GET['nim']);
header("Location: mahasiswa.php");