<?php 
session_start();
include "../koneksi.php";

if(!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

$username = $_SESSION['username'];

$sql = 'SELECT * FROM user';
$result = $conn->query($sql);

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
    <style>
        body{
            background-image: url("../assets/homepage2.png");
            background-repeat: no-repeat;
            background-size: cover;   
            background-position: center center;
            background-attachment: fixed;
        }
    </style>
</head>
<body class="background" style="overflow-y: hidden">
    <nav class="navbar navbar-expand-lg bg-none p-3 text-light d-flex justify-content-between fs-5">
        <div class="container-fluid d-flex mx-5">
            <a class="navbar-brand text-light" href="#">Navbar</a>
        </div>
        <div class="collapse navbar-collapse d-flex mx-5" id="navbarNav">
            <ul class="navbar-nav d-flex mx-5" style="width: max-content;">
                <li class=" mx-3">
                    <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="#">Features</a>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="#">Pricing</a>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="#">Special Offer</a>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="../history.php">History</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bxs-user-circle fs-1'></i>
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

    <div style="height: 85vh;">
        <div class="text-light" style="background-color: rgba(255,255,255,0.3);max-width: 20%; backdrop-filter: blur(10px) ; margin: 3% 0 0 5%; border-radius: 8px;">
            <p class="fs-2 text-light ">Welcome Back, </p>
            <p class="fs-1 text-light"> <?php echo ($username); ?></p>
        </div>  
        <div class=" d-flex justify-content-center align-items-center flex-column" style="height: 65vh; width:100%">
            <p class="fs-1 text-light text-center" style="max-width: 600px; ">Access live travel updates ✈️, discussion forum 💬,currency converter 💵, and more... all on Travel+.</p>
            <button type="button" class="btn btn-primary btn-lg"><a class="text-light" href="../destination/japan.php">Large button</a></button>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>