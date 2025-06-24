<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            background-color: #ffe6f0;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-box {
            background: #fff0f5;
            width: 350px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(255, 192, 203, 0.5);
            text-align: center;
        }

        h2 {
            color: #d63384;
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            color: #555;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ffb6c1;
            border-radius: 8px;
            outline: none;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #ff69b4;
            border: none;
            color: white;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #ff85c1;
        }

        .register-link {
            margin-top: 15px;
            font-size: 0.9em;
        }

        .register-link a {
            color: #d63384;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Login</h2>
    <form action="proses_login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Masuk</button>
    </form>
    <div class="register-link">
        Belum daftar? <a href="register.php">Daftar dulu</a>
    </div>
</div>
</body>
</html>
