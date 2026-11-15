<?php
// Latihan 1 — Menjalankan PHP
// Akses lewat http://localhost/Lab7Web_PHP/latihan1_menjalankan_php.php (bukan klik ganda).
date_default_timezone_set("Asia/Jakarta");

$judul     = "Latihan 1 — Belajar PHP";
$deskripsi = "Memastikan PHP berjalan di server lokal dan kodenya tidak tampil sebagai teks.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <?php
    echo "<p>PHP berhasil dijalankan.</p>";
    echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
    echo "<p>Versi PHP: " . PHP_VERSION . "</p>";
    ?>
</section>

<?php require __DIR__ . "/includes/footer.php"; ?>
