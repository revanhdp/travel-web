<?php 
session_start();
include "../koneksi.php";

if(!isset($_SESSION['username'])){
    header("Location: ../index.php");
    exit();
}

if(isset($_GET['id'])){
    $order_id = $_GET['id'];

    $sql = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $order_id);

    if ($stmt->execute()){
        header("Location: ../history.php");
    } else {
        echo "Error : " . $conn->error;
    }
}else {
    header("Location: ../history.php");
}
?>