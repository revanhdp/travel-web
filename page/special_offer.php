<?php 
session_start();
include "../koneksi.php";

// IDs of special offer destinations
$special_offer_ids = [1, 15, 3, 17];
$discount_rate = 0.20;

// Fetch special offer cards
$placeholders = implode(',', array_fill(0, count($special_offer_ids), '?'));
$sql = "SELECT * FROM destination_cards WHERE id IN ($placeholders)";
$stmt = $conn->prepare($sql);
$stmt->bind_param(str_repeat('i', count($special_offer_ids)), ...$special_offer_ids);
$stmt->execute();
$result = $stmt->get_result();
$cards = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Offer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="background">

    <?php include "layout/navbar.php"; ?>

    <div style="background-color: #000000; padding: 0 300px 0 300px">
        <p class="fs-4 text-center text-light pb-3 pt-3">Special Offer</p>
        
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-4 mt-4" style="width: 75%; margin: auto">
        <?php foreach ($cards as $card) : ?>
            <div class="card" style="width: 18rem;">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                20%
                <span class="visually-hidden">unread messages</span>
            </span>
                <img src="<?php echo $card['image_path']; ?>" style="height: 200px" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo $card['judul']; ?></h5>
                    <p class="card-text"><?php echo $card['deskripsi']; ?></p>
                    <?php 
                    $discounted_price = $card['harga'] - ($card['harga'] * $discount_rate);
                        ?>
                    <!-- <h5 class="card-text text-danger mt-auto">Special Price: <br>Rp. <?php echo number_format($discounted_price, 2); ?></h5> -->
                    <button type="button" class="btn mt-auto bg-dark">
                        <a class="text-light " style="text-decoration: none" href="detail.php?id=<?php echo $card['id']; ?>&special_offer=1">Pesan</a>
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
