<?php
require_once '../config/db.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID artikel tidak ditemukan!'); window.location.href='index.php';</script>";
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Artikel tidak ditemukan!'); window.location.href='index.php';</script>";
    exit;
}

$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($data['judul']) ?></title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #ffe6f0;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background-color: #fff0f5;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 0 12px rgba(255, 182, 193, 0.3);
        }

        h2 {
            color: #d63384;
        }

        .tanggal {
            color: #999;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        p {
            line-height: 1.6;
            color: #444;
        }

        .back-link {
            margin-bottom: 20px;
        }

        .back-link a {
            background-color: #ff69b4;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link a:hover {
            background-color: #ff85c1;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="back-link">
        <a href="../auth/dashboard.php">← Kembali ke Beranda</a>
    </div>

    <h2><?= htmlspecialchars($data['judul']) ?></h2>
    <div class="tanggal"><?= htmlspecialchars($data['tanggal']) ?></div>
    <p><?= nl2br(htmlspecialchars($data['konten'])) ?></p>
</div>
</body>
</html>
