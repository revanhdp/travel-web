<?php 
session_start();
include "../koneksi.php";

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT o.*, d.judul, d.image_path, p.name FROM orders o 
        INNER JOIN destination_cards d ON o.destination_cards_id = d.id
        INNER JOIN payment_method p ON o.payment_method_id = p.id
        WHERE o.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Mendapatkan daftar opsi trip
$opsi_sql = "SELECT id, option_name FROM opsi_trip";
$opsi_result = $conn->query($opsi_sql);
$opsi_trip = [];
while ($row = $opsi_result->fetch_assoc()) {
    $opsi_trip[$row['id']] = $row['option_name'];
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="background">

    <?php include "layout/navbar.php" ?>

    <div style="background-color: #000000; padding: 0 300px 0 300px">
        <p class="fs-4 text-center text-light pb-3 pt-3">Booking</p>
    </div>

    <div class="container mt-5">
        <div class="d-flex flex-wrap justify-content-center gap-4 ">     
            <?php while ($order = $result->fetch_assoc()) : ?>
            <div class="card" style="width: 18rem;">
                        <img src="<?php echo $order['image_path']; ?>" class="card-img-top" style="height:200px" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $order['judul']; ?></h5>
                            <p class="card-text"><?php echo "Jumlah Tiket: " . $order['jumlah_tiket']; ?></p>
                            <p class="card-text">
                                <?php 
                                    $selected_opsi_ids = explode(',', $order['opsi_trip_ids']);
                                    $selected_opsi_names = array_map(function($id) use ($opsi_trip) {
                                        return $opsi_trip[$id];
                                    }, $selected_opsi_ids);
                                    echo implode(', ', $selected_opsi_names);
                                ?>
                            </p>
                            <p class="card-text"><?php echo "Total Harga: " . "Rp. " . number_format($order['total_harga'], 2); ?></p>
                            <p><?php echo "Metode Pembayaran : " . $order['name']; ?></p>
                            <p class="card-text"><?php echo "Waktu Pemesanan : " . $order['order_date']; ?></p>
                            <div class="d-flex justify-content-end gap-1 mt-auto">
                                    <a href="edit_order.php?id=<?php echo $order['id']; ?>" class="btn btn-primary btn-sm"><i class='bx bxs-edit-alt text-light fs-5' ></i></a>
                                    <a href="../action/delete_order.php?id=<?php echo $order['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus ini')"><i class='bx bxs-trash text-light fs-5'></i></a>
                            </div>

                        </div>
                </div>
            <?php endwhile; ?>
        </div>
        
    </div>
                            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
