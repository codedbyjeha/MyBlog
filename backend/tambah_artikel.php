<?php require_once '../config/session.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Artikel</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color: #ffe6f0;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #fff0f5;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(255, 192, 203, 0.4);
        }

        h2 {
            text-align: center;
            color: #d63384;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #555;
            font-weight: bold;
        }

        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ffc0cb;
            margin-top: 5px;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #ff69b4;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff85c1;
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

    <h2>Tambah Artikel</h2>
    <form action="proses_artikel.php" method="POST">
        <label for="judul">Judul Artikel:</label>
        <input type="text" name="judul" required>

        <label for="konten">Isi Konten:</label>
        <textarea name="konten" rows="6" required></textarea>

        <label for="tanggal">Tanggal Posting:</label>
        <input type="date" name="tanggal" required>

        <button type="submit">Simpan Artikel</button>
    </form>
</div>
</body>
</html>
