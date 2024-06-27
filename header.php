<?php
include "koneksi.php";

// Pastikan pengguna sudah login
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Query untuk mengambil data pengguna
    $query = "SELECT * FROM tbl_user WHERE username = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Ambil data pengguna
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        // Jika pengguna tidak ditemukan, arahkan kembali ke halaman login
        header("Location: login.php");
        exit();
    }
} else {
    // Jika sesi tidak ada, arahkan ke halaman login
    header("Location: login.php");
    exit();
}
?>


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
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ubah_profile">
                                <i class="bi bi-person-circle"></i>
                                <span class="ms-1">Profile</span>
                            </a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ubah_password">
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

<!-- Ubah Password-->
<div class="modal fade" id="ubah_password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="proses_ubah_password.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input disabled type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" value="<?php echo $_SESSION['username'] ?>">
                                <label for="floatingInput">Username</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password_lama" required>
                                <label for="floatingInput">Password Lama</label>
                                <div class="invalid-feedback">Masukkan Password Lama</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="password_baru" required>
                                <label for="floatingInput">Password Baru</label>
                                <div class="invalid-feedback">Masukkan Password Baru</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="konfirmasi_password_baru" required>
                                <label for="floatingInput">Konfirmasi Password Baru</label>
                                <div class="invalid-feedback">Masukkan Password Baru</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="ubah_password_validate">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Ubah Profile-->
<div class="modal fade" id="ubah_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="proses_ubah_profile.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Username" name="username" value="<?php echo $user['username']; ?>" readonly>
                                <label for="floatingPassword">Username</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingNama" name="nama_lengkap" value="<?php echo $user['nama_lengkap']; ?>" required>
                                <label for="floatingNama">Nama</label>
                                <div class="invalid-feedback">Masukkan Nama</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" name="email" value="<?php echo $user['email']; ?>" required>
                                <label for="floatingEmail">Email</label>
                                <div class="invalid-feedback">Masukkan Email</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingPhone" placeholder="08xxxxxxxxxxx" name="nomor_telepon" value="<?php echo $user['nomor_telepon']; ?>" required>
                                <label for="floatingPhone">Nomor Telepon</label>
                                <div class="invalid-feedback">Masukkan Nomor Telepon</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="floatingTextarea" style="height: 100px" name="alamat" required><?php echo $user['alamat']; ?></textarea>
                        <label for="floatingTextarea">Alamat</label>
                        <div class="invalid-feedback">Masukkan Alamat</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="ubah_profile_validate">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
