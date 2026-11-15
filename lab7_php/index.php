<?php
// index.php — Menu utama Praktikum 7: Pemrograman Server-Side dengan PHP
$judul     = "Praktikum 7 — Pemrograman Server-Side dengan PHP";
$deskripsi = "Pemrograman Web | Teknik Informatika";
$tampilNav = false;

$menu = [
    "Latihan" => [
        ["latihan1_menjalankan_php.php",  "Latihan 1 — Menjalankan PHP",                    "echo, date(), file PHP lewat localhost"],
        ["latihan2_nilai_akhir.php",      "Latihan 2 — Variabel, operator, percabangan",    "Nilai akhir dan predikat"],
        ["latihan3_array.php",            "Latihan 3 — Perulangan dan array",               "foreach daftar mahasiswa"],
        ["latihan4_function.php",         "Latihan 4 — Membuat function",                   "Diskon, luas persegi panjang, kelulusan"],
        ["latihan5_get.php",              "Latihan 5 — Form dengan GET",                    "Pencarian kata kunci"],
        ["latihan6_post.php",             "Latihan 6 — Form dengan POST",                   "Nama dan program studi"],
        ["latihan7_transaksi.php",        "Latihan 7 — Pengolahan data sederhana",          "Subtotal transaksi"],
    ],
    "Mini Project" => [
        ["miniproject_mahasiswa.php",     "Mini Project — Formulir Data Mahasiswa",         "Validasi server-side lengkap"],
    ],
    "Eksperimen Mandiri" => [
        ["eksperimen1_rata_rata.php",     "Eksperimen 1 — Nilai rata-rata tiga komponen",   ""],
        ["eksperimen2_cari_nama.php",     "Eksperimen 2 — Cari nama dengan GET",            ""],
        ["eksperimen3_format_rupiah.php", "Eksperimen 3 — Function format Rupiah",          ""],
        ["eksperimen4_validasi_nim.php",  "Eksperimen 4 — Validasi NIM",                    ""],
        ["eksperimen5_reset_form.php",    "Eksperimen 5 — Tombol reset vs proses ulang",    ""],
    ],
];

require __DIR__ . "/includes/header.php";
?>

<?php foreach ($menu as $kelompok => $daftar): ?>
    <section class="card">
        <h2><?= htmlspecialchars($kelompok, ENT_QUOTES, "UTF-8") ?></h2>
        <ul class="menu">
            <?php foreach ($daftar as [$file, $teks, $ket]): ?>
                <li>
                    <a href="<?= htmlspecialchars($file, ENT_QUOTES, "UTF-8") ?>">
                        <?= htmlspecialchars($teks, ENT_QUOTES, "UTF-8") ?>
                        <?php if ($ket !== ""): ?>
                            <small><?= htmlspecialchars($ket, ENT_QUOTES, "UTF-8") ?></small>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endforeach; ?>

<?php require __DIR__ . "/includes/footer.php"; ?>
