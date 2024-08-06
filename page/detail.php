<?php 
session_start();
include "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$destination_card_id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = 'SELECT * FROM destination_cards WHERE id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $destination_card_id);
$stmt->execute();
$result = $stmt->get_result();
$card = $result->fetch_assoc();

$payment_sql = 'SELECT * FROM payment_method';
$payment_result = $conn->query($payment_sql);
$payment_method = $payment_result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="background">
    <nav class="navbar navbar-expand-lg p-3 text-light d-flex justify-content-between fs-5" style="background-color: #41789F">
        <div class="container-fluid d-flex mx-5">
            <a class="navbar-brand text-light" href="#">Navbar</a>
        </div>
        <div class="collapse navbar-collapse d-flex mx-5" id="navbarNav">
            <ul class="navbar-nav d-flex mx-5" style="width: max-content;">
                <li class=" mx-3">
                    <a class="nav-link active text-light" aria-current="page" href="../home/homepage.php">Home</a>
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
                    <a class="nav-link text-light" href="../history.php">History</a>
                </li>
                <li class=" text-light mx-3">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $card['image_path']; ?>" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <h1><?php echo $card['judul']; ?></h1>
                <p><?php echo $card['deskripsi']; ?></p>
                <h5><?php echo "Harga Tiket ini yaitu RP. " . $card['harga'] ."Jt"; ?></h5>
            </div>
            <form id="paymentForm" method="POST" action="../action/pembayaran.php">
                <div class="mb-3">
                    <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                    <input type="number" class="form-control" name="jumlah_tiket" id="jumlah_tiket" required>
                </div>
                <div class="mb-3">
                    <label for="payment_method_id" class="form-label">Metode Pembayaran</label>
                    <select class="form-control" name="payment_method_id" id="payment_method_id" required>
                        <?php foreach ($payment_method as $method) : ?>
                            <option value="<?php echo $method['id']; ?>"> <?php echo $method['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="destination_cards_id" value="<?php echo $card['id']; ?>">
                <input type="hidden" name="total_harga" value="<?php echo $card['harga']; ?>">
                <button type="button" class="btn btn-primary" id="payButton">Bayar</button>
                <button type="button" class="btn btn-secondary" onclick="history.back();">Kembali</button>
            </form>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Konfirmasi Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="modalBodyText"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="confirmPayButton">Konfirmasi Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('payButton').addEventListener('click', function() {
            var jumlahTiket = document.getElementById('jumlah_tiket').value;
            var hargaTiket = <?php echo $card['harga']; ?>;
            var totalHarga = jumlahTiket * hargaTiket;

            document.getElementById('modalBodyText').innerText = 'Total Harga: Rp. ' + totalHarga + 'Jt';
            var paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
            paymentModal.show();
        });

        document.getElementById('confirmPayButton').addEventListener('click', function() {
            document.getElementById('paymentForm').submit();
        });
    </script>
</body>
</html>
