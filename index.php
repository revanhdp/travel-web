<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class=" min-vh-100 d-flex justify-content-center align-items-center " style="background-color: #F8EDED ">
        <div class="row w-100 bg-none" style="min-height: 100vh;">
            <div class="col-5 d-flex flex-column justify-content-center align-items-center p-0" style="background-color: #C7A5EA">
                <div>
                    <p>Hallloo</p>
                </div>
                <img class="mt-5 pt-5" src="tokyo.png" alt="">
                
            </div>
            <div class="col-7 bg-light d-flex flex-column justify-content-center align-items-center text-dark">
                <h1 style="margin-bottom: 30px" class="mb-20">Login</h1>
                <form action="login.php" method="POST" class="w-50">
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold text-xl fs-5">Username</label>
                        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" style="background-color: #EFEFEF">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="password" class="form-label fw-bold text-xl fs-5 ">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <p class="text-center">Belum punya akun? Silahkan <a  href="registrasi.php">Daftar</a></p>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        <?php
        session_start();
        if (isset($_SESSION['error_message'])) {
            echo 'alert("' . $_SESSION['error_message'] . '");';
            unset($_SESSION['error_message']);
        }
        ?>
    </script>
</body>
</html>
