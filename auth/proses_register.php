<?php
require_once '../config/db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password_hash) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hash);

if ($stmt->execute()) {
    echo "<script>alert('Registrasi berhasil!'); window.location.href = 'login.php';</script>";
} else {
    echo "Registrasi gagal: " . $stmt->error;
}
?>
