<?php 
session_start();
include "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$destination_card_id = isset($_GET['id']) ? $_GET['id'] : 0;
$special_offer = isset($_GET['special_offer']) ? $_GET['special_offer'] : 0;

$sql = 'SELECT * FROM destination_cards WHERE id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $destination_card_id);
$stmt->execute();
$result = $stmt->get_result();
$card = $result->fetch_assoc();

$payment_sql = 'SELECT * FROM payment_method';
$payment_result = $conn->query($payment_sql);
$payment_method = $payment_result->fetch_all(MYSQLI_ASSOC);

$special_offer_ids = [1, 15, 3, 17];
$discount_rate = 0.20;
$display_price = in_array($destination_card_id, $special_offer_ids) ? $card['harga'] - ($card['harga'] * $discount_rate) : $card['harga'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="background">

    <?php include "layout/navbar.php" ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $card['image_path']; ?>" class="img-fluid mb-5" alt="">
            </div>
            <div class="col-md-6">
                <h1><?php echo $card['judul']; ?></h1>
                <p><?php echo $card['deskripsi']; ?></p>
                <h5><?php echo "Harga Tiket ini: <br> Rp. " . number_format($display_price, 2); ?></h5>
                <button type="button" class="btn bg-dark text-light" id="orderButton">Pesan</button>
                <!-- <button type="button" class="btn btn-secondary" onclick="history.back();">Kembali</button> -->
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Pesan Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="paymentForm" method="POST" action="../action/pembayaran.php">
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                                <input type="number" class="form-control" name="jumlah_tiket" id="jumlah_tiket" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="payment_method_id" class="form-label">Metode Pembayaran</label>
                                <select class="form-control" name="payment_method_id" id="payment_method_id" required>
                                    <?php foreach ($payment_method as $method) : ?>
                                        <option value="<?php echo $method['id']; ?>"> <?php echo $method['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="destination_cards_id" value="<?php echo $card['id']; ?>">
                        <input type="hidden" name="total_harga" value="<?php echo $display_price; ?>">
                        <button type="button" class="btn btn-primary" id="payButton">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function formatRupiah(angka, prefix) {
            var number_string = angka.toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        document.getElementById('orderButton').addEventListener('click', function() {
            var orderModal = new bootstrap.Modal(document.getElementById('orderModal'));
            orderModal.show();
        });

        document.getElementById('payButton').addEventListener('click', function() {
            var jumlahTiket = document.getElementById('jumlah_tiket').value;
            var hargaTiket = <?php echo $display_price; ?>;
            var totalHarga = jumlahTiket * hargaTiket;

            document.getElementById('modalBodyText').innerText = 'Total Harga: ' + formatRupiah(totalHarga, 'Rp.');
            var paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
            paymentModal.show();
        });

        document.getElementById('confirmPayButton').addEventListener('click', function() {
            document.getElementById('paymentForm').submit();
        });
    </script>
</body>
</html>
