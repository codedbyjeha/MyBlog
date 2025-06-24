<?php
// Ambil data dari form
$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
$alamat = $_POST['alamat'] ?? '';

// Validasi
$errors = [];

if (empty($nama)) {
    $errors[] = "Nama tidak boleh kosong.";
}

if (empty($email)) {
    $errors[] = "Email tidak boleh kosong.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email tidak valid (harus mengandung '@' dan '.').";
}

if (empty($jenis_kelamin)) {
    $errors[] = "Jenis kelamin harus dipilih.";
}

if (empty($alamat)) {
    $errors[] = "Alamat tidak boleh kosong.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Biodata</title>
    <style>
        body {
            background-color: #ffe6f0;
            font-family: 'Segoe UI', sans-serif;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            background-color: #fff0f5;
            margin: auto;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(255, 192, 203, 0.3);
        }

        h2 {
            text-align: center;
            color: #d63384;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin: 10px 0;
        }

        ul {
            color: red;
            padding-left: 20px;
        }

        .back-link {
            margin-top: 30px;
            text-align: center;
        }

        .back-link a {
            background-color: #ff69b4;
            color: white;
            padding: 10px 20px;
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
    <h2>Hasil Biodata</h2>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
        <div class="back-link">
            <a href="../views/form_biodata.php">← Kembali ke Form</a>
        </div>
    <?php else: ?>
        <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        <p><strong>Jenis Kelamin:</strong> <?= htmlspecialchars($jenis_kelamin) ?></p>
        <p><strong>Alamat:</strong> <?= nl2br(htmlspecialchars($alamat)) ?></p>

        <!-- Form tersembunyi untuk simpan ke DB -->
        <form action="simpan_ke_db.php" method="POST">
            <input type="hidden" name="nama" value="<?= htmlspecialchars($nama) ?>">
            <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
            <input type="hidden" name="jenis_kelamin" value="<?= htmlspecialchars($jenis_kelamin) ?>">
            <input type="hidden" name="alamat" value="<?= htmlspecialchars($alamat) ?>">
            <button type="submit" style="margin-top: 15px; width:100%; padding:10px; background-color:#ff69b4; color:white; border:none; border-radius:8px; font-weight:bold;">Simpan ke Database</button>
        </form>

        <div class="back-link">
            <a href="../auth/dashboard.php">← Kembali ke Beranda</a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
