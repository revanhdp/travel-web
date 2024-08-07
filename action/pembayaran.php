<?php 
session_start();
include "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$destination_cards_id = $_POST['destination_cards_id'];
$jumlah_tiket = $_POST['jumlah_tiket'];
$payment_method_id = $_POST['payment_method_id'];

$sql = 'SELECT harga FROM destination_cards WHERE id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $destination_cards_id);
$stmt->execute();
$result = $stmt->get_result();
$card = $result->fetch_assoc();

$special_offer_ids = [1, 15, 3, 17];
$discount_rate = 0.20;
$price = in_array($destination_cards_id, $special_offer_ids) ? $card['harga'] - ($card['harga'] * $discount_rate) : $card['harga'];

$total_harga = $price * $jumlah_tiket;

$sql = "INSERT INTO orders (user_id, destination_cards_id, jumlah_tiket, total_harga, payment_method_id, order_date) VALUES (?, ?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param('iiidi', $user_id, $destination_cards_id, $jumlah_tiket, $total_harga, $payment_method_id);
$stmt->execute();

header('Location: ../page/history.php');
?>
