<?php
// Mini Project — Aplikasi Formulir Data Mahasiswa
// Bagian 1: pemrosesan data (logika). Bagian 2: tampilan HTML (di bawah).

const SEMESTER_MIN = 1;
const SEMESTER_MAX = 14;

/** Mengambil nilai POST sebagai string yang sudah di-trim. */
function ambilPost(string $kunci): string
{
    return isset($_POST[$kunci]) && is_string($_POST[$kunci]) ? trim($_POST[$kunci]) : "";
}

// ===== BAGIAN 1: PEMROSESAN =====
$data  = null;   // berisi data valid untuk ditampilkan
$error = [];     // daftar pesan kesalahan

// Nilai awal form (agar input tidak hilang saat terjadi error)
$nama = $nim = $prodi = $semesterInput = $email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama          = ambilPost("nama");
    $nim           = ambilPost("nim");
    $prodi         = ambilPost("prodi");
    $semesterInput = ambilPost("semester");
    $email         = ambilPost("email");

    if ($nama === "")  $error[] = "Nama wajib diisi.";
    if ($nim === "")   $error[] = "NIM wajib diisi.";
    if ($prodi === "") $error[] = "Program studi wajib diisi.";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    if (
        !ctype_digit($semesterInput) ||
        (int) $semesterInput < SEMESTER_MIN ||
        (int) $semesterInput > SEMESTER_MAX
    ) {
        $error[] = "Semester harus berupa angka " . SEMESTER_MIN . "–" . SEMESTER_MAX . ".";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int) $semesterInput;
    }
}

// ===== BAGIAN 2: TAMPILAN =====
$judul     = "Mini Project — Formulir Data Mahasiswa";
$deskripsi = "Validasi server-side: kolom wajib, semester bilangan bulat, dan format email.";
require __DIR__ . "/includes/header.php";
?>

<section class="card">
    <form method="POST" action="" novalidate>
        <label for="nama">Nama</label>
        <input id="nama" name="nama" type="text"
               value="<?= htmlspecialchars($nama, ENT_QUOTES, "UTF-8") ?>">

        <label for="nim">NIM</label>
        <input id="nim" name="nim" type="text"
               value="<?= htmlspecialchars($nim, ENT_QUOTES, "UTF-8") ?>">

        <label for="prodi">Program Studi</label>
        <input id="prodi" name="prodi" type="text"
               value="<?= htmlspecialchars($prodi, ENT_QUOTES, "UTF-8") ?>">

        <label for="semester">Semester (<?= SEMESTER_MIN ?>–<?= SEMESTER_MAX ?>)</label>
        <input id="semester" name="semester" type="text" inputmode="numeric"
               value="<?= htmlspecialchars($semesterInput, ENT_QUOTES, "UTF-8") ?>">

        <label for="email">Email</label>
        <input id="email" name="email" type="text"
               value="<?= htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?>">

        <button type="submit">Kirim</button>
    </form>
</section>

<?php if ($error): ?>
    <div class="alert alert-error">
        <strong>Data belum valid:</strong>
        <ul>
            <?php foreach ($error as $pesan): ?>
                <li><?= htmlspecialchars($pesan, ENT_QUOTES, "UTF-8") ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($data): ?>
    <section class="card">
        <h3>Ringkasan Data Mahasiswa</h3>
        <table>
            <tr><th>Nama</th><td><?= htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8") ?></td></tr>
            <tr><th>NIM</th><td><?= htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8") ?></td></tr>
            <tr><th>Program Studi</th><td><?= htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8") ?></td></tr>
            <tr><th>Semester</th><td><?= (int) $data["semester"] ?></td></tr>
            <tr><th>Email</th><td><?= htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8") ?></td></tr>
        </table>
    </section>
<?php endif; ?>

<?php require __DIR__ . "/includes/footer.php"; ?>
