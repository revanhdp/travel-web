<nav class="navbar navbar-expand-lg p-3 text-light d-flex justify-content-between fs-5" style="background-color: #000000">
        <div class="container-fluid d-flex mx-5">
            <a class="navbar-brand text-light fs-2" href="homepage.php">Travela</a>
        </div>
        <div class="collapse navbar-collapse d-flex mx-5" id="navbarNav">
            <ul class="navbar-nav d-flex mx-5" style="width: max-content;">
                <li class=" mx-3">
                    <a class="nav-link active text-light" aria-current="page" href="homepage.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Destination
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="japan.php">Japan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="korea.php">Korea</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="china.php">China</a></li>
                    </ul>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="special_offer.php">Special Offer</a>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="history.php">Booking</a>
                </li>
                <li class=" mx-3">
                    <a class="nav-link text-light" href="https://wa.me/+6285887510981">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class='bx bxs-user-circle fs-1' style="margin-top: 0px"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="update_user.php">Setting</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#" id="logout-link">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <script>
        // Tampilkan konfirmasi saat tombol logout diklik
        document.getElementById('logout-link').addEventListener('click', function(event) {
            event.preventDefault();
            if (confirm('Yakin mau Logout?')) {
                window.location.href = '../action/logout.php';
            }
        });
    </script>