<?php
session_start();
include "../koneksi.php";

#Set Waktu Ke Indonesia
date_default_timezone_set('Asia/Jakarta');

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $jumlah_tiket = $_POST['jumlah_tiket'];
        $payment_method_id = $_POST['payment_method_id'];
        $order_date = date('Y-m-d H:i:s'); // waktu saat ini

        // Hitung total harga
        $harga_per_tiket = $_POST['harga_per_tiket'];
        $total_harga = $jumlah_tiket * $harga_per_tiket;

        $sql = "UPDATE orders SET jumlah_tiket = ?, payment_method_id = ?, order_date = ?, total_harga = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iisdi', $jumlah_tiket, $payment_method_id, $order_date, $total_harga, $order_id);

        if ($stmt->execute()) {
            header('Location: ../page/history.php');
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $sql = "SELECT o.*, d.harga FROM orders o JOIN destination_cards d ON o.destination_cards_id = d.id WHERE o.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order = $stmt->get_result()->fetch_assoc();

    // Ambil data metode pembayaran dari database
    $payment_sql = "SELECT * FROM payment_method";
    $payment_result = $conn->query($payment_sql);
    $payment_methods = $payment_result->fetch_all(MYSQLI_ASSOC);
} else {
    header('Location: ../page/history.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pemesanan</title>
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
                    <a class="nav-link text-light" href="#">History</a></li>
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
        <h1>Update Pemesanan</h1>
        <form id="updateForm" method="POST" action="update.php?id=<?php echo $order['id']; ?>">
            <div class="mb-3">
                <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" value="<?php echo $order['jumlah_tiket']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="payment_method_id" class="form-label">Metode Pembayaran</label>
                <select class="form-control" id="payment_method_id" name="payment_method_id" required>
                    <?php foreach ($payment_methods as $method) : ?>
                        <option value="<?php echo $method['id']; ?>" <?php if ($order['payment_method_id'] == $method['id']) echo 'selected'; ?>>
                            <?php echo $method['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="hidden" name="harga_per_tiket" value="<?php echo $order['harga']; ?>">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">Update</button>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Pembaruan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin memperbarui pesanan ini dengan total harga: <span id="totalHarga"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="confirmUpdate">Ya, Update</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('confirmUpdate').addEventListener('click', function () {
            document.getElementById('updateForm').submit();
        });

        document.getElementById('jumlah_tiket').addEventListener('input', function () {
            const hargaPerTiket = <?php echo $order['harga']; ?>;
            const jumlahTiket = this.value;
            const totalHarga = hargaPerTiket * jumlahTiket;
            document.getElementById('totalHarga').innerText = 'Rp. ' + totalHarga + 'Jt';
        });

        const initialJumlahTiket = document.getElementById('jumlah_tiket').value;
        const hargaPerTiket = <?php echo $order['harga']; ?>;
        document.getElementById('totalHarga').innerText = 'Rp. ' + (initialJumlahTiket * hargaPerTiket) + 'Jt';
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
