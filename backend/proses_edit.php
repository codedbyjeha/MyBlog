<?php
require_once '../config/db.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];

$sql = "UPDATE biodata SET nama=?, email=?, jenis_kelamin=?, alamat=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $nama, $email, $jenis_kelamin, $alamat, $id);

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil diperbarui'); window.location.href = '../views/index_biodata.php';</script>";
} else {
    echo "Gagal mengupdate data: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
