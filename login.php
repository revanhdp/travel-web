<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = 'SELECT * FROM user WHERE email = ?';
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($password == $row['password']) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['username'] = $row['username'];

                header("Location: home/homepage.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Password salah";
            }
        } else {
            $_SESSION['error_message'] = "User tidak ditemukan";
        }
        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Username / Password harus diisi";
    }

    header("Location: index.php");
    exit();
}
?>
