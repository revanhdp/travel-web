<?php 
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $destination_cards_id = $_POST['destination_cards_id'];
    $jumlah_tiket = (int)$_POST['jumlah_tiket'];
    $payment_method_id = (int)$_POST['payment_method_id'];
    $harga_tiket = (int)$_POST['total_harga'];
    $total_harga = $jumlah_tiket * $harga_tiket;

    $sql = "INSERT INTO orders (user_id, destination_cards_id, jumlah_tiket, payment_method_id, total_harga) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iiiii', $user_id, $destination_cards_id, $jumlah_tiket, $payment_method_id, $total_harga);

    if ($stmt->execute()) {
        header('Location: history.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: home/homepage.php');
    exit();
}
?>
