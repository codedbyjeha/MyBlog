<?php
require_once '../config/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM biodata WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Biodata</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color: #ffe6f0;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 600px;
            background-color: #fff0f5;
            margin: 50px auto;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 0 12px rgba(255, 192, 203, 0.4);
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

        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ffc0cb;
            margin-top: 5px;
        }

        input[type="radio"] {
            margin-right: 5px;
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

    <h2>Edit Biodata</h2>
    <form action="proses_edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>

        <label>Jenis Kelamin:</label>
        <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?>> Laki-laki</label>
        <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>> Perempuan</label>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" rows="4" required><?= htmlspecialchars($data['alamat']) ?></textarea>

        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>
