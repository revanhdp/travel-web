<?php 
session_start();
include "../koneksi.php";

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

$destination_cards_id = isset($_GET['id']) ? $_GET['id'] : 0;

// Ambil data destinasi dari database berdasarkan ID
$sql = 'SELECT * FROM destination_cards WHERE id = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $destination_cards_id);
$stmt->execute();
$result = $stmt->get_result();
$card = $result->fetch_assoc();

if (!$card) {
    die('Destinasi tidak ditemukan');
}

// 
$sql_about = "SELECT * FROM about WHERE destination_cards_id = ?";
$stmt = $conn->prepare($sql_about);
$stmt->bind_param('i', $destination_cards_id);
$stmt->execute();
$result = $stmt->get_result();
$image = $result->fetch_all(MYSQLI_ASSOC);

if (!$image) {
    $image_not_found = true;
}else{
    $image_not_found = false;
}

// Ambil opsi trip yang tersedia untuk destinasi ini
$opsi_sql = "SELECT id, option_name, option_price FROM opsi_trip WHERE destination_cards_id = ?";
$stmt = $conn->prepare($opsi_sql);
$stmt->bind_param('i', $destination_cards_id);
$stmt->execute();
$opsi_result = $stmt->get_result();
$opsi_trip = [];
while ($row = $opsi_result->fetch_assoc()) {
    $opsi_trip[] = $row;
}

// Ambil daftar metode pembayaran dari database
$payment_sql = "SELECT id, name FROM payment_method";
$payment_result = $conn->query($payment_sql);
$payment_methods = $payment_result->fetch_all(MYSQLI_ASSOC);
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
    <style>
        .about-img {
            width: 630px;
        }
        .about-img:active{
            scale: 1.3;

        }
    </style>
</head>
<body class="background">

    <!-- Memasukkan navbar -->
    <?php include "layout/navbar.php" ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Menampilkan gambar destinasi -->
                <img src="<?php echo htmlspecialchars($card['image_path']); ?>" class="img-fluid mb-5" alt="">
            </div>
            <div class="col-md-6">
                <h1><?php echo htmlspecialchars($card['judul']); ?></h1>
                <p><?php echo htmlspecialchars($card['deskripsi']); ?></p>
                <div class="border border-dark p-5 rounded-2 mb-3">
                    <form id="paymentForm" method="POST" action="../action/pembayaran.php">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <!-- Input jumlah tiket -->
                                <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                                <input type="number" class="form-control" name="jumlah_tiket" id="jumlah_tiket" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <!-- Input tanggal pendaftaran -->
                                <label for="order_date" class="form-label">Tanggal Penerbangan</label>
                                <input type="date" class="form-control" name="order_date" id="order_date" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Opsi Trip</label><br>
                            <?php foreach ($opsi_trip as $opsi) : ?>
                                <div class="form-check">
                                    <!-- Checkbox untuk opsi trip -->
                                    <input class="form-check-input" type="checkbox" name="opsi_trip[]" value="<?php echo htmlspecialchars($opsi['id']); ?>" data-harga="<?php echo htmlspecialchars($opsi['option_price']); ?>">
                                    <label class="form-check-label"><?php echo htmlspecialchars($opsi['option_name']) . " - Rp. " . number_format($opsi['option_price'], 2); ?></label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <!-- Dropdown untuk memilih metode pembayaran -->
                                <label for="payment_method_id" class="form-label">Metode Pembayaran</label>
                                <select class="form-control" name="payment_method_id" id="payment_method_id" required>
                                    <?php foreach ($payment_methods as $method) : ?>
                                        <option value="<?php echo htmlspecialchars($method['id']); ?>">
                                            <?php echo htmlspecialchars($method['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                        </div>
                        </div>
                        <!-- Menyimpan data yang akan dikirim saat form dikirim -->
                            <input type="hidden" name="destination_cards_id" value="<?php echo htmlspecialchars($card['id']); ?>">
                            <input type="hidden" name="total_harga" id="total_harga">
                            <input type="hidden" name="opsi_trip_ids" id="opsi_trip_ids"> <!-- Menyimpan ID dari opsi trip yang dipilih -->
                            <button type="button" class="btn btn-primary" id="payButton">Bayar</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Gallery -->
        <p class="d-flex justify-content-center mt-5 fs-1">Gallery <?php echo $card['judul']; ?></p>
        <div class="d-flex justify-content-center flex-wrap">
            <?php if(!empty($image)) : ?>
                <?php foreach ($image as $img): ?>
                    <div class="d-flex flex-row ">
                        <img class="d-flex flex-row m-1 about-img" src="<?php echo $img['img_path']; ?>" alt=".....">
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Gambar Gallery tidak tersedia</p>
            <?php endif; ?>
        </div>

    </div>

    <!-- Modal untuk konfirmasi pembayaran -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Konfirmasi Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalBodyText"></p>
                    <p ></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="confirmPayButton">Konfirmasi Bayar</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS dan Custom Script -->
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

    document.getElementById('payButton').addEventListener('click', function() {
        var jumlahTiket = parseInt(document.getElementById('jumlah_tiket').value) || 0;
        var orderDate = document.getElementById('order_date').value;
        var paymentMethod = document.getElementById('payment_method_id').selectedOptions[0].textContent;

        var checkboxes = document.querySelectorAll('input[name="opsi_trip[]"]:checked');
        var totalHargaOpsi = 0;
        var selectedOpsiTripIds = [];
        var selectedOpsiTripNames = [];

        checkboxes.forEach(function(checkbox) {
            var hargaOpsi = parseFloat(checkbox.getAttribute('data-harga')) || 0;
            var opsiName = checkbox.nextElementSibling.textContent.trim().split(' ')[0];
            totalHargaOpsi += hargaOpsi;
            selectedOpsiTripIds.push(checkbox.value);
            selectedOpsiTripNames.push(opsiName);
        });

        // Total harga dikalikan dengan jumlah tiket
        var totalHarga = jumlahTiket * totalHargaOpsi;

        document.getElementById('total_harga').value = totalHarga;
        document.getElementById('opsi_trip_ids').value = selectedOpsiTripIds.join(',');

        var modalBodyText = `
            Jumlah Tiket = ${jumlahTiket} <br>
            Waktu Penerbangan = ${orderDate} <br>
            Opsi Trip = ${selectedOpsiTripNames.join(', ')} <br>
            Metode Pembayaran = ${paymentMethod} <br>
            Total Harga = ${formatRupiah(totalHarga, 'Rp.') }

        `;
        document.getElementById('modalBodyText').innerHTML = modalBodyText;

        // Menampilkan Modal
        var paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
        paymentModal.show();
    });

    document.getElementById('confirmPayButton').addEventListener('click', function() {
        document.getElementById('paymentForm').submit();
    });
    </script>

</body>
</html>
