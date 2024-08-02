<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <!-- <style>
        body{
            background-image: url("../homepage2.png");
            background-repeat: no-repeat;
            background-size: cover;   
            background-position: center center;
            background-attachment: fixed;
        }
    </style> -->
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
            <p class="fs-4 text-light">Korea</p>
            <p>Lorem ipsum dolor sit, ?</p>
        </div>
        <div>
            <img src="japan-list.png" alt="">
        </div>
    </div>

    <div class="d-flex flex-wrap gap-3 mt-4" style="width: 80%; margin: auto">
    <div class="card" style="width: 18rem;">
            <img src="../home/assets/china.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Osaka</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Go somewhere</button>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="japan-list.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">Go somewhere</button>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="japan-list.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="japan-list.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="japan-list.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="japan-list.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Modal title 1</h5>
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
    <!-- <div class=" d-flex justify-content-center align-items-center flex-column" style="height:90vh; width:100%">
        <p class="fs-1 text-light text-center" style="max-width: 600px; ">Access live travel updates ✈️, discussion forum 💬,currency converter 💵, and more... all on Travel+.</p>
        <button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="">Large button</a></button>
    </div> -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>