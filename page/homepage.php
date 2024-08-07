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
            background-repeat: no-repeat;
            background-size: cover;   
            background-position: center center;
            background-attachment: fixed;
            transition: background-image 1s ease-in-out;
        }
    </style>
</head>
<body class="background" style="overflow-y: hidden">
    <nav class="navbar navbar-expand-lg bg-none p-3 text-light d-flex justify-content-between fs-5">
        <div class="container-fluid d-flex mx-5">
            <a class="navbar-brand text-light fs-2" href="homepage.php">Travela</a>
        </div>
        <div class="collapse navbar-collapse d-flex mx-5" id="navbarNav">
            <ul class="navbar-nav d-flex mx-5" style="width: max-content;">
                <li class=" mx-3">
                    <a class="nav-link text-light" href="special_offer.php">Special Offer</a>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="history.php">My Trip</a>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="https://wa.me/+6285887510981">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bxs-user-circle fs-1'></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="update_user.php">Setting</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" id="logout-link" href="#">Logout</a></li>
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
            <p class="fs-1 text-light text-center" style="max-width: 600px; ">Discover the wonders of East Asia with Travela. and explore exclusive deals for Japan, China, and Korea. Start your adventure with us today!.</p>
            <div class="d-flex justify-content-center align-items-center gap-2">
                <button type="button" class="btn btn-lg" style="background-color: rgba(255,255,255,0.3); backdrop-filter: blur(10px) ;border-radius: 8px;"><a class="text-light" href="china.php" style="text-decoration: none">
                    China</a>
                </button>
                <button type="button" class="btn btn-lg" style="background-color: rgba(255,255,255,0.3); backdrop-filter: blur(10px) ;border-radius: 8px;"><a class="text-light" href="japan.php" style="text-decoration: none">
                    Japan</a>
                </button>
                <button type="button" class="btn btn-lg" style="background-color: rgba(255,255,255,0.3); backdrop-filter: blur(10px) ;border-radius: 8px;"><a class="text-light" href="korea.php" style="text-decoration: none">
                    Korea</a>
                </button>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const backgrounds = [
            "assets/bg-china.jpg",
            "assets/bg-korea.jpg",
            "assets/bg-japan.jpg"
        ];

        let currentIndex = 0;

        function changeBackground(){
            currentIndex = (currentIndex + 1) % backgrounds.length;
            document.body.style.backgroundImage = `url(${backgrounds[currentIndex]})`;
        }

        setInterval(changeBackground, 3000);

        document.body.style.backgroundImage = `url(${backgrounds[0]})`;

        document.getElementById('logout-link').addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm('Yakin mau Logout?')) {
                window.location.href = '../action/logout.php';
            }
        });
    </script>

</body>
</html>