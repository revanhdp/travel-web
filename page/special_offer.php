<?php 
session_start();
include "../koneksi.php";

$sql = "SELECT * FROM destination_cards WHERE kategori IN ('jepang', 'china', 'korea') ORDER BY RAND() LIMIT 5";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $cards = $result->fetch_all(MYSQLI_ASSOC);
} else{
    $cards = [];
}

foreach ($cards as $card){
    $update_sql = "UPDATE destination_cards SET diskon = TRUE WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param('i', $card['id']);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Offer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="background">

    <?php include "layout/navbar.php" ?>

        <div class="d-flex justify-content-between align-items-center" style="background-color: #41789F; padding: 0 300px 0 300px">
            <div style="max-width: 300px;">
                <a class="nav-link text-light fs-4 pt-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Special Offer
                </a>

            </div>
            <div>
                <img class="mb-2" src="assets/china-map.png" style="height: 150px; width: 150px" alt="">
            </div>
        </div>


        <div class="d-flex flex-wrap gap-3 mt-4 justify-content-center" style="width: 80%; margin: auto">
            <?php foreach ($cards as $card): ?>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $card['image_path'] ?>" class="card-img-top" style="height:200px" alt="">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $card['judul']; ?></h5>
                        <p class="card-text"><?php echo $card['deskripsi']; ?></p>
                        <p class="card-text text-danger">
                            <del>Rp<?php echo number_format($card['harga'], 0, ',', '.'); ?></del>
                            Rp.<?php echo number_format($card['harga'] * 0.8, 0, ',', '.'); ?>
                        </p>
                        <button type="button" class="btn btn-primary mt-auto">
                            <a class="text-light" style="text-decoration: none" href="detail.php?id=<?php echo $card['id']; ?>">Lihat Detail</a>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
