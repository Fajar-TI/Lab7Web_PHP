# Lab7Web_PHP
Tugas Post Test Praktikum 7

# Lab7Web_PHP — Praktikum 7: Pemrograman Server-Side dengan PHP

| | |
|---|---|
| **Nama** | Fajar Dwi Santoso |
| **NIM** | 312510141 |
| **Program Studi** | Teknik Informatika |
| **Mata Kuliah** | Pemrograman Web |
| **Praktikum** | 7 — Pemrograman Server-Side dengan PHP |

## Tujuan Praktikum

1. Memahami perbedaan pemrosesan client-side dan server-side.
2. Mengenali sintaks PHP dan menjalankan file PHP melalui server lokal.
3. Menggunakan variabel, tipe data, operator, percabangan, perulangan, dan function.
4. Menerima dan memproses data dari form HTML dengan metode GET dan POST.
5. Melakukan validasi dan sanitasi input dasar sebelum data ditampilkan atau diproses.
6. Membangun aplikasi sederhana yang menerima, memproses, dan menampilkan data pengguna.

## Perangkat

- Laptop/PC dan web browser
- Visual Studio Code
- PHP 8.x
- Server lokal XAMPP (Apache) atau Laragon

## Cara Menjalankan Server Lokal

**Opsi A — XAMPP**
1. Buka XAMPP Control Panel, lalu klik **Start** pada modul **Apache**.
2. Salin folder `Lab7Web_PHP` ke `C:\xampp\htdocs\`.
3. Buka browser: `http://localhost/Lab7Web_PHP/`

**Opsi B — Laragon**
1. Jalankan Laragon, klik **Start All**.
2. Salin folder `Lab7Web_PHP` ke `C:\laragon\www\`.
3. Buka browser: `http://localhost/Lab7Web_PHP/`

**Opsi C — PHP built-in server (tanpa XAMPP/Laragon)**
```bash
cd Lab7Web_PHP
php -S localhost:8000
# lalu buka http://localhost:8000/
```

> File PHP **tidak boleh** dibuka dengan klik ganda (`file:///...`), karena kode PHP harus diproses oleh web server.

## Struktur File

```
Lab7Web_PHP/
├── index.php                      # Menu utama ke seluruh latihan
├── latihan1_menjalankan_php.php   # Latihan 1 — Menjalankan PHP
├── latihan2_nilai_akhir.php       # Latihan 2 — Variabel, operator, percabangan
├── latihan3_array.php             # Latihan 3 — Perulangan dan array
├── latihan4_function.php          # Latihan 4 — Function
├── latihan5_get.php               # Latihan 5 — Form GET
├── latihan6_post.php              # Latihan 6 — Form POST
├── latihan7_transaksi.php         # Latihan 7 — Pengolahan data sederhana
├── miniproject_mahasiswa.php      # Mini Project — Formulir Data Mahasiswa
├── eksperimen1_rata_rata.php      # Eksperimen 1 — Nilai rata-rata
├── eksperimen2_cari_nama.php      # Eksperimen 2 — Cari nama (GET)
├── eksperimen3_format_rupiah.php  # Eksperimen 3 — Function format Rupiah
├── eksperimen4_validasi_nim.php   # Eksperimen 4 — Validasi NIM
├── eksperimen5_reset_form.php     # Eksperimen 5 — Reset vs proses ulang
├── includes/
│   ├── header.php                 # Kerangka HTML bagian atas
│   └── footer.php                 # Kerangka HTML bagian bawah
├── assets/
│   └── style.css                  # Gaya tampilan bersama
└── screenshots/                   # Tangkapan layar hasil praktikum
```

## Ringkasan Hasil

| No | File | Ringkasan |
|----|------|-----------|
| 1 | `latihan1_menjalankan_php.php` | PHP dieksekusi server; browser hanya menerima HTML. Menampilkan waktu server dan versi PHP. |
| 2 | `latihan2_nilai_akhir.php` | Nilai akhir = Tugas 30% + UTS 30% + UAS 40%. Data Siti (85, 78, 90) menghasilkan 84,90 dengan predikat B. Tersedia tabel pengujian beberapa kombinasi. |
| 3 | `latihan3_array.php` | Daftar 7 mahasiswa (3 nama tambahan) ditampilkan dengan `foreach`. |
| 4 | `latihan4_function.php` | `hitungDiskon()` (150.000 dengan diskon 10% menjadi Rp135.000), `hitungLuasPersegiPanjang()`, `tentukanKelulusan()`, dan `formatRupiah()`. |
| 5 | `latihan5_get.php` | Data dikirim lewat URL (`?kata=...`) dan ditampilkan aman dengan `htmlspecialchars()`. |
| 6 | `latihan6_post.php` | Data dikirim lewat body POST, divalidasi, dan ditampilkan aman. Tag HTML dan tanda kutip tampil sebagai teks. |
| 7 | `latihan7_transaksi.php` | Subtotal = harga x jumlah. Validasi menolak harga non-angka/negatif serta jumlah 0, negatif, atau bukan bilangan bulat. |
| MP | `miniproject_mahasiswa.php` | Form 5 kolom dengan validasi server-side (wajib diisi, semester 1–14, email valid). Semua pesan error ditampilkan sekaligus. Logika dipisah dari tampilan. |
| E1 | `eksperimen1_rata_rata.php` | Rata-rata tiga komponen nilai (0–100). |
| E2 | `eksperimen2_cari_nama.php` | Pencarian nama pada array dengan `stripos()` (tidak peka huruf besar/kecil). |
| E3 | `eksperimen3_format_rupiah.php` | Function `formatRupiah()` berbasis `number_format()`. |
| E4 | `eksperimen4_validasi_nim.php` | NIM harus angka saja dengan panjang tepat 9 digit. |
| E5 | `eksperimen5_reset_form.php` | Reset dijalankan browser tanpa request ke server; Kirim/muat ulang diproses server (terlihat dari waktu proses). |

## Kasus Uji Validasi (Mini Project)

**Input valid**

| # | Input | Hasil |
|---|-------|-------|
| 1 | Nama `Fajar Dwi Santoso`, NIM `312510141`, Prodi `Teknik Informatika`, Semester `3`, Email `fajar@example.com` | Data diterima dan ringkasan ditampilkan. |
| 2 | Nama `Siti Aminah`, NIM `312510200`, Prodi `Sistem Informasi`, Semester `14`, Email `siti.aminah@kampus.ac.id` | Data diterima (14 adalah batas atas yang diizinkan). |

**Input tidak valid**

| # | Input | Hasil |
|---|-------|-------|
| 1 | Semua kolom kosong, Semester `15`, Email `salah` | Muncul 5 pesan: nama, NIM, prodi wajib diisi; format email tidak valid; semester harus 1–14. |
| 2 | Semester `abc` atau `3.5` atau `0`, Email `fajar@` | Ditolak: semester harus bilangan bulat 1–14 dan format email tidak valid. |

Uji keamanan output: memasukkan `<script>alert(1)</script>` pada kolom Nama akan tampil sebagai teks biasa (`&lt;script&gt;...`), bukan dieksekusi.

## Screenshot

Simpan tangkapan layar pada folder `screenshots/` dengan penamaan berikut:

| File | Isi |
|------|-----|
| `latihan1.png` – `latihan7.png` | Output setiap latihan |
| `miniproject_valid.png` | Mini project dengan data valid |
| `miniproject_error.png` | Mini project dengan hasil validasi gagal |
| `eksperimen1.png` – `eksperimen5.png` | Output setiap eksperimen |

