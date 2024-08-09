<?php 
session_start();
include "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

// Mendapatkan data dari form
$user_id = $_SESSION['user_id'];
$destination_cards_id = $_POST['destination_cards_id'];
$jumlah_tiket = $_POST['jumlah_tiket'];
$opsi_trip_ids = $_POST['opsi_trip_ids']; // Menyimpan opsi trip yang dipilih
$total_harga = $_POST['total_harga'];
$payment_method_id = $_POST['payment_method_id'];

// Insert order ke database
$order_sql = "INSERT INTO orders (user_id, destination_cards_id, jumlah_tiket, opsi_trip_ids, total_harga, order_date, payment_method_id) 
VALUES (?, ?, ?, ?, ?, NOW(), ?)";
$stmt = $conn->prepare($order_sql);
$stmt->bind_param('iiiisi', $user_id, $destination_cards_id, $jumlah_tiket, $opsi_trip_ids, $total_harga, $payment_method_id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header('Location: ../page/history.php');
    exit();
} else {
    echo "Gagal memproses pesanan. Silakan coba lagi.";
}
?>
