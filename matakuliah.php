<?php
require_once 'matakuliah1.php';

$data = MataKuliah::getAll();
?>

<div class="card">
<h3>Manajemen Mata Kuliah</h3>

<table>
<tr>
<th>No</th>
<th>Kode</th>
<th>Nama</th>
<th>SKS</th>
<th>Semester</th>
<th>Jurusan</th>
</tr>

<?php $no=1; foreach($data as $m): ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $m['kode'] ?></td>
<td><?= $m['nama'] ?></td>
<td><?= $m['sks'] ?></td>
<td><?= $m['semester'] ?></td>
<td><?= $m['jurusan'] ?></td>
</tr>
<?php endforeach; ?>

</table>
</div>