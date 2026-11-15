<?php
// Eksperimen 4 — Validasi NIM: hanya angka dan panjang tepat 9 digit
// (ketentuan: NIM terdiri dari 9 digit angka, contoh 312510141).
const NIM_PANJANG = 9;

$nim     = "";
$pesan   = null;
$valid   = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nim = isset($_POST["nim"]) && is_string($_POST["nim"]) ? trim($_POST["nim"]) : "";

    if ($nim === "") {
        $pesan = "NIM wajib diisi.";
    } elseif (!ctype_digit($nim)) {
        $pesan = "NIM hanya boleh berisi angka (0–9).";
    } elseif (strlen($nim) !== NIM_PANJANG) {
        $pesan = "NIM harus terdiri dari tepat " . NIM_PANJANG . " digit (saat ini " . strlen($nim) . " digit).";
    } else {
        $valid = true;
    }
}

$judul     = "Eksperimen 4 — Validasi NIM";
$deskripsi = "NIM harus angka saja dengan panjang " . NIM_PANJANG . " digit.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <form method="POST" action="">
        <label for="nim">NIM</label>
        <input id="nim" name="nim" type="text" inputmode="numeric"
               value="<?= htmlspecialchars($nim, ENT_QUOTES, "UTF-8") ?>">
        <button type="submit">Validasi</button>
    </form>
</section>

<?php if ($valid): ?>
    <div class="alert alert-success">
        NIM <strong><?= htmlspecialchars($nim, ENT_QUOTES, "UTF-8") ?></strong> valid.
    </div>
<?php elseif ($pesan !== null): ?>
    <div class="alert alert-error"><?= htmlspecialchars($pesan, ENT_QUOTES, "UTF-8") ?></div>
<?php endif; ?>

<?php require __DIR__ . "/includes/footer.php"; ?>
