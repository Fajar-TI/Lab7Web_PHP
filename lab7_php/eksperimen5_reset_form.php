<?php
// Eksperimen 5 — Tombol reset vs pemrosesan ulang di server
date_default_timezone_set("Asia/Jakarta");

$nama = "";
$prodi = "";
$waktuProses  = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama  = isset($_POST["nama"])  && is_string($_POST["nama"])  ? trim($_POST["nama"])  : "";
    $prodi = isset($_POST["prodi"]) && is_string($_POST["prodi"]) ? trim($_POST["prodi"]) : "";
    $waktuProses = date("d-m-Y H:i:s"); // berubah hanya jika server memproses permintaan
}

$judul     = "Eksperimen 5 — Tombol Reset vs Proses Ulang";
$deskripsi = "Bandingkan perilaku tombol Reset (browser) dengan Kirim/muat ulang (server).";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <form method="POST" action="">
        <label for="nama">Nama</label>
        <input id="nama" name="nama" type="text"
               value="<?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?>">

        <label for="prodi">Program Studi</label>
        <input id="prodi" name="prodi" type="text"
               value="<?= htmlspecialchars($prodi, ENT_QUOTES, "UTF-8") ?>">

        <button type="submit">Kirim</button>
        <button type="reset">Reset</button>
        <a class="btn btn-secondary" href="eksperimen5_reset_form.php">Muat Ulang (kosongkan dari server)</a>
    </form>
</section>

<?php if ($waktuProses !== null): ?>
    <section class="card">
        <h3>Hasil pemrosesan server</h3>
        Nama: <?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?><br>
        Program Studi: <?= htmlspecialchars($prodi, ENT_QUOTES, "UTF-8") ?><br>
        Diproses server pada: <strong><?= $waktuProses ?></strong>
    </section>
<?php endif; ?>

<section class="card">
    <h3>Penjelasan</h3>
    <ul>
        <li><strong>Reset</strong> dijalankan oleh browser (client-side): isian form dikembalikan ke nilai awal
            atribut <code>value</code>, <u>tanpa</u> mengirim permintaan ke server. Waktu proses di atas tidak berubah.
            Setelah form dikirim, nilai awalnya adalah data yang tadi diproses, sehingga Reset
            mengembalikan ke data tersebut, bukan mengosongkan.</li>
        <li><strong>Kirim / muat ulang</strong> membuat permintaan baru ke server sehingga PHP memproses ulang
            dan waktu proses berubah. Tombol "Muat Ulang" meminta halaman tanpa data POST, jadi form benar-benar kosong.</li>
    </ul>
</section>

<?php require __DIR__ . "/includes/footer.php"; ?>
