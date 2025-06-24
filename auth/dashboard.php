<?php
require_once '../config/session.php';
require_once '../config/db.php';

// Ambil 5 artikel terbaru
$sql = "SELECT * FROM posts ORDER BY tanggal DESC LIMIT 5";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #fff0f5;
      display: flex;
    }

    /* Sidebar */
    .sidebar {
      width: 220px;
      background-color: #ffd6e6;
      height: 100vh;
      padding: 20px;
      box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    }

    .sidebar h2 {
      font-size: 18px;
      color: #d63384;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: block;
      color: #333;
      text-decoration: none;
      margin: 10px 0;
      padding: 8px;
      border-radius: 6px;
    }

    .sidebar a:hover {
      background-color: #ffb6c1;
      color: white;
    }

    /* Main */
    .main-content {
      flex: 1;
      padding: 30px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .topbar h1 {
      font-size: 24px;
      color: #d63384;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }

    .card {
      background: #ffffff;
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(255, 192, 203, 0.3);
    }

    .card h3 {
      margin-top: 0;
      color: #d63384;
    }

    .card p {
      color: #555;
    }

    .card .tanggal {
      font-size: 0.85em;
      color: #999;
    }

    .card a {
      color: #ff69b4;
      text-decoration: none;
    }

    .card a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Hallo, <?= htmlspecialchars($_SESSION['username']) ?>🌸</h2>
    <a href="dashboard.php">Beranda</a>
    <a href="../views/form_biodata.php">Isi Biodata</a>
    <a href="../views/index_biodata.php">Daftar Biodata</a>
    <a href="../backend/tambah_artikel.php">Tambah Artikel</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="main-content">
    <div class="topbar">
      <h1>Beranda Artikel</h1>
    </div>

    <div class="card-grid">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card">
          <h3><?= htmlspecialchars($row['judul']) ?></h3>
          <div class="tanggal"><?= htmlspecialchars($row['tanggal']) ?></div>
          <p><?= htmlspecialchars(substr($row['konten'], 0, 100)) ?>...</p>
          <a href="../views/read_more.php?id=<?= $row['id'] ?>">Baca selengkapnya</a>
        </div>
      <?php endwhile; ?>
    </div>
  </div>

</body>
</html>
