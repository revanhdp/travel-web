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
    $order_date = $_POST['order_date'];

    $update_sql = "UPDATE orders SET jumlah_tiket = ?, opsi_trip_ids = ?, total_harga = ?, payment_method_id = ?, order_date = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param('issisi', $jumlah_tiket, $opsi_ids, $total_harga, $payment_method_id, $order_date, $order_id);
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
    <?php include "layout/navbar.php"; ?>
    
    <div class="container mt-5" style="max-width: 50%">
        <h1 class="text-center">Edit Pesanan</h1>
        <form method="post" id="orderForm">
            <div class="mb-3">
                <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" value="<?= htmlspecialchars($order['jumlah_tiket']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Opsi Trip</label><br>
                <?php foreach ($opsi_trip as $opsi) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="opsi_<?= $opsi['id']; ?>" name="opsi_trip[]" value="<?= $opsi['id']; ?>" data-price="<?= $opsi['option_price']; ?>" <?= in_array($opsi['id'], explode(',', $order['opsi_trip_ids'])) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="opsi_<?= $opsi['id']; ?>"><?= htmlspecialchars($opsi['option_name']) . ' - Rp. ' . number_format($opsi['option_price'], 2); ?></label>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="mb-3">
                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                <select class="form-select" id="payment_method" name="payment_method_id" required>
                    <?php foreach ($payment_methods as $method) : ?>
                        <option value="<?= $method['id']; ?>" <?= $method['id'] == $order['payment_method_id'] ? 'selected' : ''; ?>><?= htmlspecialchars($method['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="order_date">Tanggal Pesanan</label>
                <input type="date" name="order_date" class="form-control" id="order_date" value="<?= htmlspecialchars($order['order_date']); ?>" required>
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
    // Fungsi untuk mengubah angka menjadi format Rupiah
    const formatRupiah = (angka, prefix) => {
        const numberString = angka.toString(); // Ubah angka jadi string
        const split = numberString.split(','); // Pisahkan angka desimal
        const sisa = split[0].length % 3; // Hitung sisa untuk format ribuan
        let rupiah = split[0].substr(0, sisa); // Ambil bagian awal angka
        const ribuan = split[0].substr(sisa).match(/\d{3}/gi); // Kelompokkan angka tiap tiga digit

        if (ribuan) { // Jika ada ribuan
            const separator = sisa ? '.' : ''; // Tentukan apakah perlu pemisah
            rupiah += separator + ribuan.join('.'); // Gabungkan angka dengan titik sebagai pemisah
        }

        return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : ''); // Tambahkan prefix 'Rp.' jika ada
    }

    // Fungsi untuk menghitung total harga tiket dan opsi yang dipilih
    const calculateTotalPrice = () => {
        const jumlahTiket = parseInt(document.getElementById('jumlah_tiket').value) || 0; // Ambil jumlah tiket dari input
        const totalHargaOpsi = Array.from(document.querySelectorAll('input[name="opsi_trip[]"]:checked'))
            .reduce((acc, checkbox) => acc + parseFloat(checkbox.getAttribute('data-price')) || 0, 0); // Hitung total harga opsi yang dipilih
        return jumlahTiket * totalHargaOpsi; // Hitung total keseluruhan harga
    }

    // Fungsi untuk memperbarui isi modal dengan informasi pesanan
    const updateModalContent = () => {
        const jumlahTiket = document.getElementById('jumlah_tiket').value || 0; // Ambil jumlah tiket
        const orderDate = document.getElementById('order_date').value;
        const opsiTripSelected = Array.from(document.querySelectorAll('input[name="opsi_trip[]"]:checked')) // Ambil opsi trip yang dipilih
            .map(checkbox => checkbox.nextElementSibling.textContent.trim().split(' ')[0]); // Hanya ambil kata pertama dari nama opsi trip
        const totalHarga = calculateTotalPrice(); // Hitung total harga
        
        // Buat teks untuk ditampilkan di modal
        let modalContent = `<p>Jumlah Tiket: ${jumlahTiket}</p>`; // Tampilkan jumlah tiket
        modalContent += `<p>Waktu Penerbangan: ${orderDate}`;
        modalContent += '<p>Opsi Trip yang Dipilih:</p><ul>'; // Judul opsi trip yang dipilih
        opsiTripSelected.forEach(opsi => {
            modalContent += `<li>${opsi}</li>`; // Tampilkan setiap opsi trip yang dipilih
        });
        modalContent += '</ul>';
        modalContent += `<p>Total Harga: ${formatRupiah(totalHarga, 'Rp.')}</p>`; // Tampilkan total harga
        
        document.getElementById('modalBodyText').innerHTML = modalContent; // Perbarui isi modal
    }

    // Ketika jumlah tiket diubah, perbarui isi modal
    document.getElementById('jumlah_tiket').addEventListener('input', updateModalContent);

    // Ketika opsi trip dipilih atau diubah, perbarui isi modal
    document.querySelectorAll('input[name="opsi_trip[]"]').forEach(checkbox => {
        checkbox.addEventListener('change', updateModalContent);
    });

    // Ketika tombol "Update Pesanan" diklik, tampilkan modal dengan informasi terbaru
    document.getElementById('updateButton').addEventListener('click', () => {
        updateModalContent(); // Perbarui isi modal dengan informasi terbaru
        new bootstrap.Modal(document.getElementById('paymentModal')).show(); // Tampilkan modal
    });

    // Ketika tombol konfirmasi di modal diklik, kirim form dengan data terbaru
    document.getElementById('confirmUpdateButton').addEventListener('click', () => {
        const form = document.getElementById('orderForm');
        
        // Buat input tersembunyi untuk total harga
        const totalHargaInput = document.createElement('input');
        totalHargaInput.type = 'hidden';
        totalHargaInput.name = 'total_harga';
        totalHargaInput.value = calculateTotalPrice(); // Set nilai total harga
        form.appendChild(totalHargaInput);

        // Buat input tersembunyi untuk opsi trip yang dipilih
        const opsiIdsInput = document.createElement('input');
        opsiIdsInput.type = 'hidden';
        opsiIdsInput.name = 'opsi_trip_ids';
        opsiIdsInput.value = Array.from(document.querySelectorAll('input[name="opsi_trip[]"]:checked'))
                                  .map(cb => cb.value).join(','); // Gabungkan ID opsi yang dipilih
        form.appendChild(opsiIdsInput);

        form.submit(); // Kirim form
    });
</script>

</body>
</html>
