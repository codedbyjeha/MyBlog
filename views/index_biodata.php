<?php
require_once '../config/db.php';

// Ambil data dari database
$sql = "SELECT * FROM biodata";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Biodata</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #ffe6f0;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background-color: #fff0f5;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 0 12px rgba(255, 182, 193, 0.3);
        }

        h2 {
            text-align: center;
            color: #d63384;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(255, 192, 203, 0.2);
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
            border: 1px solid #ffc0cb;
            font-size: 14px;
        }

        th {
            background-color: #ffb6c1;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #fff5fa;
        }

        tr:hover {
            background-color: #ffe6f0;
        }

        .aksi a {
            color: #d63384;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .aksi a:hover {
            text-decoration: underline;
        }
<div class="container">
    <div style="margin-bottom: 20px;">
        <a href="../auth/dashboard.php" style="background-color: #ff69b4; color: white; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-weight: bold;">← Kembali ke Beranda</a>
    </div>

    <h2>Daftar Biodata</h2>
    <!-- tabel isi biodata -->
</div>
    </style>
</head>
<body>
<div class="container">
    <h2>Daftar Biodata</h2>
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        if ($result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                    <td><?= htmlspecialchars($row['alamat']) ?></td>
                    <td class="aksi">
                        <a href="../backend/edit.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="../backend/hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6" style="text-align: center;">Tidak ada data.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
