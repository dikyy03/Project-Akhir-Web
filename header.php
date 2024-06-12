<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="."><i class="bi bi-droplet-half"></i>NabWater</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 'pelanggan') { ?>
                    <a class="nav-link  <?php echo (isset($_GET['x']) && $_GET['x'] == 'home' || !isset($_GET['x'])) ? 'active' : ''; ?>" aria-current="page" href="home">
                        <i class="bi bi-house"></i>
                        <span class="ms-0,5">Home</span>
                    </a>
                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'menu') ? 'active' : ''; ?>" href="menu">
                        <i class="bi bi-shop-window"></i>
                        <span class="ms-0,5">Menu</span>
                    </a>
                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'riwayat_pesanan') ? 'active' : ''; ?>" href="riwayat_pesanan">
                        <i class="bi bi-clock-history"></i>
                        <span class="ms-0,5">Riwayat Pesanan</span>
                    </a>
                <?php } ?>
                <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 'kurir') { ?>
                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'pengiriman') ? 'active' : ''; ?>" href="pengiriman">
                        <i class="bi bi-truck"></i>
                        <span class="ms-0,5">Pengiriman</span>
                    </a>
                <?php } ?>
                <?php if (isset($_SESSION['status']) && $_SESSION['status'] == 'admin') { ?>
                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'daftar_menu') ? 'active' : ''; ?>" href="daftar_menu">
                        <i class="bi bi-card-list"></i>
                        <span class="ms-0,5">Daftar Menu</span>
                    </a>
                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'daftar_pesanan') ? 'active' : ''; ?>" href="daftar_pesanan">
                        <i class="bi bi-card-list"></i>
                        <span class="ms-0,5">Daftar Pesanan</span>
                    </a>
                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'daftar_user') ? 'active' : ''; ?>" href="daftar_user">
                        <i class="bi bi-card-list"></i>
                        <span class="ms-0,5">Daftar User</span>
                    </a>
                <?php } ?>
            </div>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown d-lg-">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                        <li><a class="dropdown-item" href="#">
                                <i class="bi bi-person-circle"></i>
                                <span class="ms-1">Profile</span>
                            </a></li>
                        <li><a class="dropdown-item" href="#">
                                <i class="bi bi-key"></i>
                                <span class="ms-1">Ubah Password</span>
                            </a></li>
                        <li><a class="dropdown-item" href="logout.php">
                                <i class="bi bi-box-arrow-in-left"></i>
                                <span class="ms-1">Log Out</span>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>