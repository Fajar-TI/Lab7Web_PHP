<?php
// Latihan 7 — Pengolahan data sederhana: subtotal transaksi
$barang   = "";
$harga    = "";
$jumlah   = "";
$error    = null;
$subtotal = null;

/** Format Rupiah: tanpa desimal jika bilangan bulat, 2 desimal jika pecahan. */
function formatRupiah(float $angka): string
{
    $desimal = (floor($angka) == $angka) ? 0 : 2;
    return "Rp" . number_format($angka, $desimal, ",", ".");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $barang      = isset($_POST["barang"]) && is_string($_POST["barang"]) ? trim($_POST["barang"]) : "";
    $hargaInput  = isset($_POST["harga"])  && is_string($_POST["harga"])  ? trim($_POST["harga"])  : "";
    $jumlahInput = isset($_POST["jumlah"]) && is_string($_POST["jumlah"]) ? trim($_POST["jumlah"]) : "";

    // Tampilkan kembali input pengguna di form
    $harga  = $hargaInput;
    $jumlah = $jumlahInput;

    if (
        $barang === "" ||
        !is_numeric($hargaInput) ||
        !is_finite((float) $hargaInput) ||
        !ctype_digit($jumlahInput) ||
        (float) $hargaInput < 0 ||
        (int) $jumlahInput < 1
    ) {
        $error = "Periksa kembali nama barang, harga, dan jumlah.";
    } else {
        $hargaNum  = (float) $hargaInput;
        $jumlahNum = (int) $jumlahInput;
        $subtotal  = $hargaNum * $jumlahNum;
    }
}

$judul     = "Latihan 7 — Pengolahan Data Sederhana";
$deskripsi = "Menghitung subtotal = harga x jumlah dan menampilkan ringkasan transaksi.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <form method="POST" action="">
        <label for="barang">Nama barang</label>
        <input id="barang" name="barang" type="text" required
               value="<?= htmlspecialchars($barang, ENT_QUOTES, "UTF-8") ?>">

        <label for="harga">Harga</label>
        <input id="harga" name="harga" type="number" min="0" step="0.01" required
               value="<?= htmlspecialchars($harga, ENT_QUOTES, "UTF-8") ?>">

        <label for="jumlah">Jumlah</label>
        <input id="jumlah" name="jumlah" type="number" min="1" step="1" required
               value="<?= htmlspecialchars($jumlah, ENT_QUOTES, "UTF-8") ?>">

        <button type="submit">Hitung</button>
    </form>
</section>

<?php if ($error !== null): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></div>
<?php elseif ($subtotal !== null): ?>
    <section class="card">
        <h3>Ringkasan Transaksi</h3>
        <table>
            <tr><th>Barang</th><td><?= htmlspecialchars($barang, ENT_QUOTES, "UTF-8") ?></td></tr>
            <tr><th>Harga satuan</th><td><?= formatRupiah($hargaNum) ?></td></tr>
            <tr><th>Jumlah</th><td><?= $jumlahNum ?></td></tr>
            <tr><th>Subtotal</th><td><strong><?= formatRupiah($subtotal) ?></strong></td></tr>
        </table>
    </section>
<?php endif; ?>

<?php require __DIR__ . "/includes/footer.php"; ?>
