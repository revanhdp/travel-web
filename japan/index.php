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
                    <a class="nav-link text-light" href="#">History</a>
                </li>
                <li class=" text-light mx-3">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="d-flex justify-content-between align-items-center" style="background-color: #41789F; padding: 0 300px 0 300px">
        <div style="max-width: 300px;">
            <p class="fs-4 text-light">Japan</p>
            <p>Lorem ipsum dolor sit, ?</p>
        </div>
        <div>
            <img src="japan-list.png" alt="">
        </div>
    </div>

    <div class="d-flex flex-wrap gap-3 mt-4 justify-content-center" style="width: 80%; margin: auto">
        <?php foreach ($cards as $card) : ?>
        <!-- Card -->
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $card['image_path']; ?>" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title"><?php echo $card['judul'];?></h5>
                        <p><strong>$19</strong></p>
                    </div>
                    <p class="card-text"><?php echo $card['deskripsi']; ?></p>
                    <button type="button" class="btn btn-primary mt-auto" data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $card['id']; ?>">Lihat Detail</button>
                </div>
            </div>
        <!-- End Card -->


        <!-- Modal -->
            <div class="modal fade" id="exampleModal1<?php echo $card['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel1<?php echo $card['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1 <?php echo $card['id']; ?>">Modal title 1  <?php echo $card['id']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Fasilitas: 
                            - Hotel Bintang 5 <br>
                            - Makan    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Modal -->
        <?php endforeach; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>