<?php
// Eksperimen 1 — Nilai rata-rata dari tiga komponen nilai (Tugas, UTS, UAS)
$nilai  = ["tugas" => "", "uts" => "", "uas" => ""];
$error  = [];
$rataRata = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($nilai as $kunci => $_) {
        $nilai[$kunci] = isset($_POST[$kunci]) && is_string($_POST[$kunci]) ? trim($_POST[$kunci]) : "";

        if ($nilai[$kunci] === "" || !is_numeric($nilai[$kunci])
            || (float) $nilai[$kunci] < 0 || (float) $nilai[$kunci] > 100) {
            $error[] = "Nilai " . strtoupper($kunci) . " harus berupa angka 0–100.";
        }
    }

    if (!$error) {
        $rataRata = array_sum(array_map("floatval", $nilai)) / count($nilai);
    }
}

$judul     = "Eksperimen 1 — Nilai Rata-rata";
$deskripsi = "Rata-rata = (Tugas + UTS + UAS) / 3.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <form method="POST" action="">
        <?php foreach ($nilai as $kunci => $isi): ?>
            <label for="<?= $kunci ?>">Nilai <?= strtoupper($kunci) ?></label>
            <input id="<?= $kunci ?>" name="<?= $kunci ?>" type="text" inputmode="decimal"
                   value="<?= htmlspecialchars($isi, ENT_QUOTES, "UTF-8") ?>">
        <?php endforeach; ?>
        <button type="submit">Hitung Rata-rata</button>
    </form>
</section>

<?php if ($error): ?>
    <div class="alert alert-error">
        <ul>
            <?php foreach ($error as $pesan): ?>
                <li><?= htmlspecialchars($pesan, ENT_QUOTES, "UTF-8") ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php elseif ($rataRata !== null): ?>
    <div class="alert alert-success">
        Nilai rata-rata: <strong><?= number_format($rataRata, 2) ?></strong>
    </div>
<?php endif; ?>

<?php require __DIR__ . "/includes/footer.php"; ?>
