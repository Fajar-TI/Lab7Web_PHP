<?php
// Eksperimen 3 — Function untuk mengubah format harga menjadi Rupiah

/**
 * Mengubah angka menjadi format Rupiah.
 * Contoh: formatRupiah(1500000) => "Rp1.500.000"
 */
function formatRupiah(float $angka, int $desimal = 0): string
{
    $prefix = $angka < 0 ? "-Rp" : "Rp";
    return $prefix . number_format(abs($angka), $desimal, ",", ".");
}

$contoh = [
    ["Pensil",   2500],
    ["Buku tulis", 12500],
    ["Tas ransel", 249000],
    ["Laptop", 8999000],
    ["Mouse (desimal)", 75500.5],
];

$judul     = "Eksperimen 3 — Function Format Rupiah";
$deskripsi = "formatRupiah() memakai number_format() dengan pemisah ribuan titik.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <table>
        <thead><tr><th>Barang</th><th>Angka asli</th><th>Format Rupiah</th></tr></thead>
        <tbody>
            <?php foreach ($contoh as [$barang, $harga]): ?>
                <tr>
                    <td><?= htmlspecialchars($barang, ENT_QUOTES, "UTF-8") ?></td>
                    <td><?= $harga ?></td>
                    <td><?= formatRupiah($harga, floor($harga) == $harga ? 0 : 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php require __DIR__ . "/includes/footer.php"; ?>
