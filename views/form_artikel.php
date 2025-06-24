<?php
require_once '../config/session.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>📝Tambah Artikel Baru</h2>
        <form action="../backend/tambah_artikel.php" method="post">
            <label>Judul:</label>
            <input type="text" name="judul" required>

            <label>Konten:</label>
            <textarea name="konten" rows="6" required></textarea>

            <label>Tanggal Posting:</label>
            <input type="date" name="tanggal" required>

            <button type="submit">Posting</button>
        </form>
        <br>
        <a href="index.php">Kembali ke Beranda</a>
    </div>
</body>
</html>
