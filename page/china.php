<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    
    <?php include "layout/navbar.php"; ?>

    <div class="d-flex justify-content-between align-items-center" style="background-color: #41789F; padding: 0 300px 0 300px">
        <div style="max-width: 300px;">
            <p class="fs-4 text-light">China</p>
            <p>Lorem ipsum dolor sit, ?</p>
        </div>
        <div>
            <img src="japan-list.png" alt="">
        </div>
    </div>

    <div class="d-flex flex-wrap gap-3 mt-4 justify-content-center align-items-center" style="width: 80%; margin: auto">
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