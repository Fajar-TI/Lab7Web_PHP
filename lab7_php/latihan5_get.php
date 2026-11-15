<?php
// Latihan 5 — Memproses form dengan GET
// Amati perubahan URL setelah form dikirim (?kata=...).
// Jangan gunakan GET untuk mengirim kata sandi atau data sensitif.
$kata   = null;
$kosong = false;

if (isset($_GET["kata"]) && is_string($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
    if ($kata === "") {
        $kosong = true;
    }
}

$judul     = "Latihan 5 — Form dengan Metode GET";
$deskripsi = "Data dikirim lewat parameter URL.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <form method="GET" action="">
        <label for="kata">Kata kunci:</label>
        <input id="kata" name="kata" type="text"
               value="<?= htmlspecialchars($kata ?? "", ENT_QUOTES, "UTF-8") ?>">
        <button type="submit">Cari</button>
    </form>

    <?php
    if ($kosong) {
        echo '<div class="alert alert-error">Kata kunci tidak boleh kosong.</div>';
    } elseif ($kata !== null) {
        echo '<div class="alert alert-success">Kata kunci: '
            . htmlspecialchars($kata, ENT_QUOTES, "UTF-8") . "</div>";
    }
    ?>
</section>

<?php require __DIR__ . "/includes/footer.php"; ?>
