
<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container-lg">
        <a class="navbar-brand" href="."><i class="bi bi-droplet-half"></i> NabWater</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='home' || !isset($_GET['x'])) ? 'active' : '' ; ?>" aria-current="page" href="index.php?x=home"><i class="bi bi-house"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='pemesanan') ? 'active' : '' ; ?>" href="index.php?x=pemesanan"><i class="bi bi-cart4"></i> Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='info_pesanan') ? 'active' : '' ; ?>" href="index.php?x=info_pesanan"><i class="bi bi-info-lg"></i> Info Pesanan</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo htmlspecialchars($_SESSION['username']); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width: 50%;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='home' || !isset($_GET['x'])) ? 'active' : '' ; ?>" aria-current="page" href="index.php?x=home"><i class="bi bi-house"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='pemesanan') ? 'active' : '' ; ?>" href="index.php?x=pemesanan"><i class="bi bi-cart4"></i> Pemesanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='info_pesanan') ? 'active' : '' ; ?>" href="index.php?x=info_pesanan"><i class="bi bi-info-lg"></i> Info Pesanan</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </a>
                <ul class="dropdown-menu dropdown-menu mt-2">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<!-- JavaScript untuk Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="path/to/your/javascript/file.js"></script>