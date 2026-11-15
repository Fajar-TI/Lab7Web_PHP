<?php
// includes/header.php — kerangka atas halaman (dipakai semua file latihan)
// Variabel yang bisa diisi oleh halaman pemanggil: $judul, $deskripsi, $tampilNav
$judul     = $judul     ?? "Praktikum 7 - PHP";
$deskripsi = $deskripsi ?? "";
$tampilNav = $tampilNav ?? true;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($judul, ENT_QUOTES, "UTF-8") ?> | Praktikum 7 PHP</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
    <?php if ($tampilNav): ?>
        <p class="nav"><a href="index.php">&larr; Kembali ke menu</a></p>
    <?php endif; ?>
    <header class="page-head">
        <h1><?= htmlspecialchars($judul, ENT_QUOTES, "UTF-8") ?></h1>
        <?php if ($deskripsi !== ""): ?>
            <p class="sub"><?= htmlspecialchars($deskripsi, ENT_QUOTES, "UTF-8") ?></p>
        <?php endif; ?>
    </header>
