<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

$order_id = $_GET['id'];

$sql = "DELETE FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $order_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header('Location: ../page/history.php');
    exit();
} else {
    echo "Gagal menghapus pesanan. Silakan coba lagi.";
}
?>
