<?php 
include "../koneksi.php";
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //ambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //cek apakah email sudah ada
    if (empty($username) || empty($email) || empty($password)){
        $_SESSION['error_message'] = "semua field harus diisi.";
        header("Location: ../registrasi.php");
        exit();
    }

    //insert pengguna baru dari database
    $email_check_sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($email_check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $_SESSION['error_message'] = "Email sudah digunakan";
        header("Location: ../registrasi.php");
        exit();
    }

    $insert_user_sql = "INSERT INTO user (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_user_sql);
    $stmt->bind_param("sss", $username, $password, $email);

    if($stmt->execute()) {
        echo '<script>
            alert("Registrasi Berhasil");
            window.location.href = "../index.php"; 
        </script>';
        exit();
    }
}
?>