<?php
// Eksperimen 2 — Mencari nama dari array data sederhana memakai GET
$dataNama = [
    "Alya Putri", "Bima Pratama", "Citra Lestari", "Doni Saputra",
    "Eka Wulandari", "Farhan Maulana", "Gita Anggraini", "Hendra Wijaya",
];

$kata  = "";
$cari  = false;
$hasil = [];

if (isset($_GET["kata"]) && is_string($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
    $cari = true;

    if ($kata !== "") {
        foreach ($dataNama as $nama) {
            if (stripos($nama, $kata) !== false) { // pencarian tidak peka huruf besar/kecil
                $hasil[] = $nama;
            }
        }
    }
}

$judul     = "Eksperimen 2 — Cari Nama dengan GET";
$deskripsi = "Pencarian bagian nama (tidak peka huruf besar/kecil) pada array.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <form method="GET" action="">
        <label for="kata">Cari nama:</label>
        <input id="kata" name="kata" type="text"
               value="<?= htmlspecialchars($kata, ENT_QUOTES, "UTF-8") ?>">
        <button type="submit">Cari</button>
    </form>
</section>

<?php if ($cari && $kata === ""): ?>
    <div class="alert alert-error">Kata kunci tidak boleh kosong.</div>
<?php elseif ($cari): ?>
    <section class="card">
        <h3>Hasil pencarian "<?= htmlspecialchars($kata, ENT_QUOTES, "UTF-8") ?>"</h3>
        <?php if ($hasil): ?>
            <ol>
                <?php foreach ($hasil as $nama): ?>
                    <li><?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?></li>
                <?php endforeach; ?>
            </ol>
            <p class="muted"><?= count($hasil) ?> nama ditemukan.</p>
        <?php else: ?>
            <p>Tidak ada nama yang cocok.</p>
        <?php endif; ?>
    </section>
<?php endif; ?>

<section class="card">
    <h3>Data yang tersedia</h3>
    <ul>
        <?php foreach ($dataNama as $nama): ?>
            <li><?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?></li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require __DIR__ . "/includes/footer.php"; ?>
