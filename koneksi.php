<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_travel";

// buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// cek koneksi
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>