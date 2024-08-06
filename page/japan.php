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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bxs-user-circle fs-1' style="margin-top: 0px"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="update.php">Setting</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="d-flex justify-content-between align-items-center" style="background-color: #41789F; padding: 0 300px 0 300px">
        <div style="max-width: 300px;">
        <li class="nav-item dropdown" style="list-style-type: none">
            <a class="nav-link dropdown-toggle text-light fs-4 pt-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Japan
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../japan">Japan</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../korea">Korea</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../china">China</a></li>
            </ul>
        </li>
            <p>Lorem ipsum dolor sit, ?</p>
        </div>
        <div>
            <img class="mb-2" src="assets/japan_map.png" style="height: 150px; width: 150px" alt="jsabfjsabfdjb">
        </div>
    </div>

    <div class="d-flex flex-wrap gap-3 mt-4 justify-content-center" style="width: 80%; margin: auto">
        <?php foreach ($cards as $card) : ?>
        <!-- Card -->
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $card['image_path']; ?>" class="card-img-top" style="height:200px" alt="...">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo $card['judul'];?></h5>
                    <p class="card-text"><?php echo $card['deskripsi']; ?></p>
                    <button type="button" class="btn btn-primary mt-auto">
                        <a class="text-light" style="text-decoration: none" href="detail.php?id=<?php echo $card['id']; ?>">Lihat Detail</a>
                    </button>
                </div>
            </div>
        <!-- End Card -->
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>