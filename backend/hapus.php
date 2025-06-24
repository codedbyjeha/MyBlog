<?php
require_once '../config/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM biodata WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('Data berhasil dihapus'); window.location.href = '../views/index_biodata.php';</script>";
} else {
    echo "Gagal menghapus data: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
