<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

// Mendapatkan data dari form
$order_id = $_POST['order_id'];
$jumlah_tiket = $_POST['jumlah_tiket'];
$payment_method_id = $_POST['payment_method_id'];
$opsi_trip_ids = implode(',', $_POST['opsi_trip_ids']);
$total_harga = // kalkulasi ulang berdasarkan opsi trip yang dipilih dan jumlah tiket;

$sql = "UPDATE orders SET jumlah_tiket = ?, payment_method_id = ?, opsi_trip_ids = ?, total_harga = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('iisii', $jumlah_tiket, $payment_method_id, $opsi_trip_ids, $total_harga, $order_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header('Location: ../page/history.php');
    exit();
} else {
    echo "Gagal mengupdate pesanan. Silakan coba lagi.";
}
?>
