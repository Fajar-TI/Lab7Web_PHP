<?php
// Latihan 4 — Membuat function

/** Menghitung harga setelah diskon (persen). */
function hitungDiskon(float $harga, float $persen): float
{
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

/** Function tambahan 1: luas persegi panjang. */
function hitungLuasPersegiPanjang(float $panjang, float $lebar): float
{
    return $panjang * $lebar;
}

/** Function tambahan 2: status kelulusan (batas lulus 60). */
function tentukanKelulusan(float $nilai, float $batas = 60): string
{
    return $nilai >= $batas ? "LULUS" : "TIDAK LULUS";
}

/** Format angka menjadi Rupiah, contoh: Rp135.000 */
function formatRupiah(float $angka, int $desimal = 0): string
{
    return "Rp" . number_format($angka, $desimal, ",", ".");
}

$hargaAwal  = 150000;
$persen     = 10;
$hargaAkhir = hitungDiskon($hargaAwal, $persen);

$judul     = "Latihan 4 — Membuat Function";
$deskripsi = "Function untuk diskon, luas persegi panjang, dan kelulusan.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <h3>1. Diskon</h3>
    <?php
    echo "Harga awal: " . formatRupiah($hargaAwal) . "<br>";
    echo "Diskon: {$persen}%<br>";
    echo "Harga setelah diskon: " . formatRupiah($hargaAkhir);
    ?>
</section>

<section class="card">
    <h3>2. Luas Persegi Panjang</h3>
    <?php
    $p = 8;
    $l = 4;
    echo "Panjang $p x Lebar $l = " . hitungLuasPersegiPanjang($p, $l);
    ?>
</section>

<section class="card">
    <h3>3. Kelulusan</h3>
    <table>
        <thead><tr><th>Nilai</th><th>Status</th></tr></thead>
        <tbody>
            <?php foreach ([85, 60, 59.5, 40] as $nilai): ?>
                <tr>
                    <td><?= $nilai ?></td>
                    <td><?= tentukanKelulusan($nilai) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php require __DIR__ . "/includes/footer.php"; ?>
