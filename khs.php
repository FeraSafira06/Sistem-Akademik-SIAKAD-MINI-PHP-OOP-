<?php
require_once 'Mahasiswa1.php';
require_once 'matakuliah1.php';

$mhs = Mahasiswa::getAll();
$mk  = MataKuliah::getAll();

echo "<h3>Kartu Hasil Studi (KHS)</h3>";

if(isset($_SESSION['nilai'])){

echo "<table border='1' cellpadding='10'>";
echo "<tr>
<th>NIM</th>
<th>Nama</th>
<th>Mata Kuliah</th>
<th>Nilai</th>
</tr>";

foreach($_SESSION['nilai'] as $n){

    // cari nama mahasiswa
    foreach($mhs as $m){
        if($m['nim'] == $n['nim']){
            $nama = $m['nama'];
        }
    }

    // cari nama matkul
    foreach($mk as $k){
        if($k['kode'] == $n['kode']){
            $matkul = $k['nama'];
        }
    }

    echo "<tr>
    <td>{$n['nim']}</td>
    <td>{$nama}</td>
    <td>{$matkul}</td>
    <td>{$n['nilai']}</td>
    </tr>";
}

echo "</table>";

} else {
    echo "Belum ada data nilai";
}
?>