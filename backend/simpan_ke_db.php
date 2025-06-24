<?php
require_once '../config/db.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];

// Simpan ke database
$stmt = $conn->prepare("INSERT INTO biodata (nama, email, jenis_kelamin, alamat) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nama, $email, $jenis_kelamin, $alamat);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Simpan Biodata</title>
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
    </style>
</head>
<body>
<div class="message-box">
    <?php if ($stmt->execute()): ?>
        <h2>Data berhasil disimpan!</h2>
        <p>Mengalihkan ke beranda...</p>
    <?php else: ?>
        <h2 style="color: red;">Gagal menyimpan data</h2>
        <p><?= $stmt->error ?></p>
        <a href="../views/form_biodata.php">← Coba lagi</a>
    <?php endif; ?>
</div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
