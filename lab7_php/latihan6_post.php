<?php
// Latihan 6 — Memproses form dengan POST
$nama  = "";
$prodi = "";
$error = "";
$sukses = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama  = isset($_POST["nama"])  && is_string($_POST["nama"])  ? trim($_POST["nama"])  : "";
    $prodi = isset($_POST["prodi"]) && is_string($_POST["prodi"]) ? trim($_POST["prodi"]) : "";

    if ($nama === "" || $prodi === "") {
        $error = "Semua kolom wajib diisi.";
    } else {
        $sukses = true;
    }
}

$judul     = "Latihan 6 — Form dengan Metode POST";
$deskripsi = "Uji dengan data lengkap, input kosong, serta karakter seperti tanda kutip dan tag HTML.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input id="nama" name="nama" type="text" required
               value="<?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?>">

        <label for="prodi">Program Studi:</label>
        <input id="prodi" name="prodi" type="text" required
               value="<?= htmlspecialchars($prodi, ENT_QUOTES, "UTF-8") ?>">

        <button type="submit" name="kirim">Kirim Data</button>
    </form>
</section>

<?php if ($error !== ""): ?>
    <div class="alert alert-error"><?= htmlspecialchars($error, ENT_QUOTES, "UTF-8") ?></div>
<?php endif; ?>

<?php if ($sukses): ?>
    <section class="card">
        <h3>Data diterima</h3>
        <?php
        echo "Nama: " . htmlspecialchars($nama, ENT_QUOTES, "UTF-8") . "<br>";
        echo "Program Studi: " . htmlspecialchars($prodi, ENT_QUOTES, "UTF-8");
        ?>
    </section>
<?php endif; ?>

<?php require __DIR__ . "/includes/footer.php"; ?>
