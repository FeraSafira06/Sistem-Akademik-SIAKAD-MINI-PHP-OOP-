<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>

<div class="card">

<h3>Hitung IPK</h3>

<?php
if(isset($_SESSION['nilai'])){
    $total = 0;
    $jumlah = count($_SESSION['nilai']);

    foreach($_SESSION['nilai'] as $n){
        $total += $n['nilai'];
    }

    $ipk = $jumlah > 0 ? $total / $jumlah : 0;
?>

<div class="cream-box">
    IPK Anda: <?= round($ipk,2) ?>
</div>

<?php } else { ?>

<div class="cream-box">
    Belum ada nilai
</div>

<?php } ?>

</div>