<?php 
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT o.*, d.judul, d.deskripsi, d.harga, d.image_path, p.name as payment_method 
        FROM orders o 
        JOIN destination_cards d ON o.destination_cards_id = d.id
        JOIN payment_method p ON o.payment_method_id = p.id
        WHERE o.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$orders = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="background">
    <nav class="navbar navbar-expand-lg p-3 text-light d-flex justify-content-between fs-5" style="background-color: #41789F;">
        <div class="container-fluid d-flex mx-5">
            <a class="navbar-brand text-light" href="#">Navbar</a>
        </div>
        <div class="collapse navbar-collapse d-flex mx-5" id="navbarNav">
            <ul class="navbar-nav d-flex mx-5" style="width: max-content;">
                <li class=" mx-3">
                    <a class="nav-link active text-light" aria-current="page" href="home/homepage.php">Home</a>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="#">Features</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        All Items
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../japan">Japan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../korea">Korea</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../china">China</a></li>
                    </ul>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="#">Special Offer</a>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="#">History</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bxs-user-circle fs-1' style="margin-top: 0px"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="update.php">Setting</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <h1>History Pemesanan</h1>
        <div class="row">
            <?php foreach ($orders as $order) : ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo $order['image_path']; ?>" class="card-img-top" alt="" style="height: 280px">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $order['judul']; ?></h5>
                        <p class="card-text"><small class="text-muted">Jumlah Tiket: <?php echo $order['jumlah_tiket']; ?></small></p>
                        <p class="card-text"><small class="text-muted">Total Harga: $<?php echo $order['total_harga']; ?></small></p>
                        <p class="card-text"><small class="text-muted">Metode Pembayaran: <?php echo $order['payment_method']; ?></small></p>
                        <p class="text-success">Lunas</p>
                        <p class="btn btn-danger">Hapus</p>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
