<?php
$host = "localhost";
$user = "root";
$pass = ""; // sesuaikan dengan password XAMPP/MAMP
$dbname = "uts_web"; // nama database yang harus dibuat di phpMyAdmin

$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
