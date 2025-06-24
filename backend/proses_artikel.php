<?php
require_once '../config/db.php';

$judul = $_POST['judul'];
$konten = $_POST['konten'];
$tanggal = $_POST['tanggal'];

// Validasi wajib isi
if (empty($judul) || empty($konten) || empty($tanggal)) {
    echo "<script>alert('Semua field wajib diisi!'); window.history.back();</script>";
    exit;
}

$sql = "INSERT INTO posts (judul, konten, tanggal) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $judul, $konten, $tanggal);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Simpan Artikel</title>
    <meta http-equiv="refresh" content="2; url=../auth/dashboard.php">
    <style>
        body {
            background-color: #ffe6f0;
            font-family: 'Segoe UI', sans-serif;
            text-align: center;
            padding: 100px;
        }

        .message-box {
            background-color: #fff0f5;
            display: inline-block;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 0 12px rgba(255, 182, 193, 0.3);
        }

        h2 {
            color: #d63384;
        }

        p {
            color: #555;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            background-color: #ff69b4;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            background-color: #ff85c1;
        }
    </style>
</head>
<body>
<div class="message-box">
    <?php if ($stmt->execute()): ?>
        <h2>Artikel berhasil disimpan!</h2>
        <p>Mengalihkan ke beranda...</p>
    <?php else: ?>
        <h2 style="color: red;">Gagal menyimpan artikel</h2>
        <p><?= $stmt->error ?></p>
        <a href="tambah_artikel.php">← Coba lagi</a>
    <?php endif; ?>
</div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
