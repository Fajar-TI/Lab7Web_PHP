<?php
// Latihan 3 — Perulangan dan array
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Farhan", "Gita"]; // 3 nama tambahan: Eka, Farhan, Gita

$judul     = "Latihan 3 — Perulangan dan Array";
$deskripsi = "Menampilkan seluruh isi array dengan foreach.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <?php
    echo "<h3>Daftar Mahasiswa</h3><ol>";
    foreach ($mahasiswa as $nama) {
        echo "<li>" . htmlspecialchars($nama, ENT_QUOTES, "UTF-8") . "</li>";
    }
    echo "</ol>";
    echo "<p class=\"muted\">Jumlah mahasiswa: " . count($mahasiswa) . "</p>";
    ?>
</section>

<?php require __DIR__ . "/includes/footer.php"; ?>
