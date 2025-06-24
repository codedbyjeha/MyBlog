<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Biodata</title>
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
            box-shadow: 0 4px 12px rgba(255, 192, 203, 0.4);
        }

        h2 {
            text-align: center;
            color: #d63384;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ffc0cb;
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
            display: block;
            text-align: left;
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

    <h2>Form Biodata</h2>
    <form action="../backend/proses_biodata.php" method="POST">
        <label for="nama">Nama Lengkap:</label>
        <input type="text" name="nama" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label>Jenis Kelamin:</label>
        <label><input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki</label>
        <label><input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan</label>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" rows="4" required></textarea>

        <button type="submit">Kirim</button>
    </form>
</div>
</body>
</html>
