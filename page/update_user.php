<?php
session_start();
include "../koneksi.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = "";

// Update username, email, and password
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {

        $sql = "UPDATE user SET username = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $username, $email, $password, $user_id);

        if ($stmt->execute()) {
            $message = "Update Berhasil!";
        } else {
            $message = "Update Gagal!";
        }
    } else {
        $message = "Isi Terlebih dahulu!";
    }
}

// Fetch current user data
$sql = "SELECT username, email FROM user WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <?php include "layout/navbar.php" ?>

    <div class="container-sm mt-5 d-flex flex-column" style="max-width: 50%">
        <p class="fs-4 " style="font-weight: 600">Setting</p>
        <p>Edit Your profile here to change Username and Password</p>
        <div class="d-flex justify-content-center align-items-center">
            <p><i class='bx bxs-user-circle' style="font-size: 300px; color: grey;" ></i></p>
        </div>
        <?php if ($message): ?>
            <script>
                alert('<?php echo $message?>');
                window.location.href = "homepage.php";
            </script>
        <?php endif; ?>
        <form id="updateForm" action="" method="POST">
            <div class="row" style="">
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label" style="font-weight: 600">New Username</label>
                    <input type="text" class="form-control" id="username" name="username" style="background-color: #EFEFEF" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label" style="font-weight: 600">New Email</label>
                    <input type="email" class="form-control" id="email" name="email" style="background-color: #EFEFEF" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="password" class="form-label" style="font-weight: 600">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" style="background-color: #EFEFEF" required>
                </div>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">Update</button>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to update your profile?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmUpdate">Yes, Update</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('confirmUpdate').addEventListener('click', function() {
            document.getElementById('updateForm').submit();
        });
    </script>
</body>
</html>
