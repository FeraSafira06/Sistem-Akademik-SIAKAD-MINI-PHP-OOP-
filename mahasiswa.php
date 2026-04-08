<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION['login'])) header("Location: login.php");

require_once 'Mahasiswa1.php';

$data = Mahasiswa::getAll();
?>

<div class="card">
<h3>Manajemen Mahasiswa</h3>

<table>
<tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Jurusan</th>
    <th>Angkatan</th>
</tr>

<?php $no=1; foreach($data as $m): ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $m['nim'] ?></td>
    <td><?= $m['nama'] ?></td>
    <td><?= $m['jurusan'] ?></td>
    <td><?= $m['angkatan'] ?></td>
</tr>
<?php endforeach; ?>

</table>
</div>