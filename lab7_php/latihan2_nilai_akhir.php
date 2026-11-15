<?php
// Latihan 2 — Variabel, operator, dan percabangan
// Bobot: Tugas 30%, UTS 30%, UAS 40%.

/** Menghitung nilai akhir berbobot. */
function hitungNilaiAkhir(float $tugas, float $uts, float $uas): float
{
    return ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
}

/** Menentukan predikat berdasarkan nilai akhir. */
function tentukanPredikat(float $nilai): string
{
    if ($nilai >= 85) {
        return "A";
    } elseif ($nilai >= 75) {
        return "B";
    } elseif ($nilai >= 60) {
        return "C";
    }
    return "D";
}

// Data utama (silakan ubah nilainya untuk menguji hasil)
$nama  = "Siti";
$tugas = 85;
$uts   = 78;
$uas   = 90;

$nilaiAkhir = hitungNilaiAkhir($tugas, $uts, $uas);
$predikat   = tentukanPredikat($nilaiAkhir);

// Beberapa kombinasi nilai untuk pengujian
$ujiKombinasi = [
    ["Siti",  85, 78, 90],
    ["Budi",  70, 65, 60],
    ["Rina", 100, 95, 98],
    ["Dedi",  40, 50, 45],
    ["Uji batas (A)", 85, 85, 85],
    ["Uji batas (B)", 75, 75, 75],
];

$judul     = "Latihan 2 — Variabel, Operator, dan Percabangan";
$deskripsi = "Nilai akhir = Tugas 30% + UTS 30% + UAS 40%.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <h2>Hasil Utama</h2>
    <?php
    echo "Nama: " . htmlspecialchars($nama, ENT_QUOTES, "UTF-8") . "<br>";
    echo "Tugas: $tugas | UTS: $uts | UAS: $uas<br>";
    echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
    echo "Predikat: " . $predikat;
    ?>
</section>

<section class="card">
    <h2>Pengujian Beberapa Kombinasi</h2>
    <table>
        <thead>
            <tr><th>Nama</th><th>Tugas</th><th>UTS</th><th>UAS</th><th>Nilai Akhir</th><th>Predikat</th></tr>
        </thead>
        <tbody>
            <?php foreach ($ujiKombinasi as [$n, $t, $u, $a]): ?>
                <?php $akhir = hitungNilaiAkhir($t, $u, $a); ?>
                <tr>
                    <td><?= htmlspecialchars($n, ENT_QUOTES, "UTF-8") ?></td>
                    <td><?= $t ?></td>
                    <td><?= $u ?></td>
                    <td><?= $a ?></td>
                    <td><?= number_format($akhir, 2) ?></td>
                    <td><?= tentukanPredikat($akhir) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php require __DIR__ . "/includes/footer.php"; ?>
