<?php
require_once '../config/db.php';

$sql = "SELECT * FROM posts ORDER BY tanggal DESC LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda Artikel</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: #fff0f5;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(255, 182, 193, 0.4);
        }

        .card h3 {
            color: #d63384;
        }

        .card p {
            color: #555;
        }

        .card .tanggal {
            font-size: 0.9em;
            color: #999;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Artikel Terbaru</h2>

    <div class="card-grid">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="card">
                <h3><?= htmlspecialchars($row['judul']) ?></h3>
                <div class="tanggal"><?= htmlspecialchars($row['tanggal']) ?></div>
                <p><?= htmlspecialchars(substr($row['konten'], 0, 100)) ?>...</p>
                <a href="read_more.php?id=<?= $row['id'] ?>">Baca Selengkapnya</a>
            </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>
