<?php 
session_start();
include "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
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

$special_offer_ids = [1, 15, 3, 4];
$discount_rate = 0.20;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="background">

    <?php include "layout/navbar.php"; ?>

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
                        <?php 
                        $display_price = in_array($order['destination_cards_id'], $special_offer_ids) ? 
                                         $order['harga'] - ($order['harga'] * $discount_rate) : $order['harga'];
                        ?>
                        <p class="card-text"><small class="text-muted">Total Harga: Rp. <?php echo number_format($order['jumlah_tiket'] * $display_price, 2); ?></small></p>
                        <p class="card-text"><small class="text-muted">Waktu Dipesan: <?php echo $order['order_date']; ?></small></p>
                        <p class="card-text"><small class="text-muted">Metode Pembayaran: <?php echo $order['payment_method']; ?></small></p>
                        <p class="text-success">Lunas</p>
                        <div class="d-flex justify-content-end align-items-end gap-1" >
                            <a href="update.php?id=<?php echo $order['id']; ?>" class="btn btn-primary"><i class='bx bx-edit-alt text-light' ></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $order['id']; ?>"><i class='bx bx-trash text-light' ></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal<?php echo $order['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $order['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel<?php echo $order['id']; ?>">Konfirmasi Penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus item ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <a href="../action/delete.php?id=<?php echo $order['id']; ?>" class="btn btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
