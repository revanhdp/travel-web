<?php 

session_start();
include "../koneksi.php";

$kategori = 'jepang';
$sql = 'SELECT * FROM destination_cards WHERE kategori = ?';
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $kategori);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    $cards = $result->fetch_all(MYSQLI_ASSOC);
}else{
    $cards = [];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Japan Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="background">

    <?php include "layout/navbar.php"; ?>

    <div class="d-flex justify-content-between align-items-center" style="background-color: #000000; padding: 0 300px 0 300px">
        <div style="max-width: 300px;">
        <li class="nav-item dropdown" style="list-style-type: none">
            <a class="nav-link dropdown-toggle text-light fs-4 pt-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Japan
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="all_destination.php">All Destination</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="korea.php">Korea</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="china.php">China</a></li>
            </ul>
        </li>
        </div>
        <div>
            <img class="mb-2" src="assets/japan_map1.png" style="height: 150px; width: 150px" alt="jsabfjsabfdjb">
        </div>
    </div>

    <div class="d-flex flex-wrap gap-3 mt-4 justify-content-center" style="width: 75%; margin: auto">
        <?php foreach ($cards as $card) : ?>
        <!-- Card -->
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $card['image_path']; ?>" class="card-img-top" style="height:200px" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo $card['judul'];?></h5>
                    <p class="card-text"><?php echo $card['deskripsi']; ?></p>
                    <button type="button" class="btn mt-auto" style="background-color: black">
                        <a class="text-light" style="text-decoration: none" href="detail.php?id=<?php echo $card['id']; ?>">Pesan</a>
                    </button>
                </div>
            </div>
        <!-- End Card -->
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>