<?php 
session_start();
include "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

$order_id = $_GET['id'];

// Ambil data pesanan
$order_sql = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($order_sql);
$stmt->bind_param('i', $order_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

if (!$order) {
    die('Pesanan tidak ditemukan');
}

// Ambil data opsi trip terkait dengan destinasi pesanan
$destination_cards_id = $order['destination_cards_id'];
$opsi_sql = "SELECT id, option_name, option_price FROM opsi_trip WHERE destination_cards_id = ?";
$stmt = $conn->prepare($opsi_sql);
$stmt->bind_param('i', $destination_cards_id);
$stmt->execute();
$opsi_trip = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jumlah_tiket = $_POST['jumlah_tiket'];
    $opsi_ids = isset($_POST['opsi_trip']) ? implode(',', $_POST['opsi_trip']) : '';
    $total_harga = $_POST['total_harga'];
    $payment_method_id = $_POST['payment_method_id'];

    $update_sql = "UPDATE orders SET jumlah_tiket = ?, opsi_trip_ids = ?, total_harga = ?, payment_method_id = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param('issii', $jumlah_tiket, $opsi_ids, $total_harga, $payment_method_id, $order_id);
    $stmt->execute();

    header('Location: history.php');
    exit();
}

// Ambil daftar metode pembayaran
$payment_sql = "SELECT id, name FROM payment_method";
$payment_methods = $conn->query($payment_sql)->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="background">

    <?php include "layout/navbar.php" ?>

    <div class="container mt-5" style="max-width: 50%">
        <h1 class="text-center">Edit Pesanan</h1>
        <form method="post" id="orderForm">
            <div class="mb-3">
                <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" value="<?php echo htmlspecialchars($order['jumlah_tiket']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Opsi Trip</label><br>
                <?php foreach ($opsi_trip as $opsi) : ?>
                    <div class="form-check form-check-block">
                        <input class="form-check-input" type="checkbox" id="opsi_<?php echo $opsi['id']; ?>" name="opsi_trip[]" value="<?php echo $opsi['id']; ?>" data-price="<?php echo $opsi['option_price']; ?>" <?php echo in_array($opsi['id'], explode(',', $order['opsi_trip_ids'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="opsi_<?php echo $opsi['id']; ?>"><?php echo htmlspecialchars($opsi['option_name']) . ' - Rp. ' . number_format($opsi['option_price'], 2); ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select class="form-select" id="payment_method" name="payment_method_id" required>
                    <?php foreach ($payment_methods as $method) : ?>
                        <option value="<?php echo $method['id']; ?>" <?php echo $method['id'] == $order['payment_method_id'] ? 'selected' : ''; ?>><?php echo htmlspecialchars($method['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <button type="button" class="btn btn-primary" id="updateButton">Update Pesanan</button>
        </form>
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
                    <button type="button" class="btn btn-primary" id="confirmUpdateButton">Konfirmasi Update</button>
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

    function calculateTotalPrice() {
        var jumlahTiket = parseInt(document.getElementById('jumlah_tiket').value) || 0;
        var checkboxes = document.querySelectorAll('input[name="opsi_trip[]"]:checked');
        var totalHargaOpsi = Array.from(checkboxes).reduce(function(acc, checkbox) {
            return acc + parseFloat(checkbox.getAttribute('data-price')) || 0;
        }, 0);
        return jumlahTiket * totalHargaOpsi;
    }

    function updateTotalPrice() {
        var totalHarga = calculateTotalPrice();
        document.getElementById('modalBodyText').innerText = 'Total Harga: ' + formatRupiah(totalHarga, 'Rp.');
    }

    document.getElementById('jumlah_tiket').addEventListener('input', updateTotalPrice);
    document.querySelectorAll('input[name="opsi_trip[]"]').forEach(function(checkbox) {
        checkbox.addEventListener('change', updateTotalPrice);
    });

    document.getElementById('updateButton').addEventListener('click', function() {
        updateTotalPrice();
        var paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
        paymentModal.show();
    });

    document.getElementById('confirmUpdateButton').addEventListener('click', function() {
        var form = document.getElementById('orderForm');
        var totalHarga = calculateTotalPrice();
        var totalHargaInput = document.createElement('input');
        totalHargaInput.type = 'hidden';
        totalHargaInput.name = 'total_harga';
        totalHargaInput.value = totalHarga;
        form.appendChild(totalHargaInput);
        var opsiIdsInput = document.createElement('input');
        opsiIdsInput.type = 'hidden';
        opsiIdsInput.name = 'opsi_trip_ids';
        opsiIdsInput.value = Array.from(document.querySelectorAll('input[name="opsi_trip[]"]:checked')).map(cb => cb.value).join(',');
        form.appendChild(opsiIdsInput);
        form.submit();
    });
    </script>
</body>
</html>
