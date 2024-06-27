<div class="container-fluid">
    <div class="row">
        <div class="col-lg mt-2">
            <div class="card">
                <div class="card-header">
                    Menu
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        $query = "SELECT * FROM tbl_daftar_menu";
        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="col-lg-3 mb-4">
                    <div class="card" style="display: flex; flex-direction: column;">
                        <img src="<?= $row['gambar'] ?>" class="card-img-top" alt="<?= $row['nama_menu'] ?>" style="height: 280px; object-fit: cover;">
                        <div class="card-body" style="display: flex; flex-direction: column; height: 250px;">
                            <h5 class="card-title"><?= $row['nama_menu'] ?></h5>
                            <p class="card-text">Harga: <?= $row['harga'] ?></p>
                            <p class="card-text">Stok: <?= $row['stok'] ?></p>
                            <p class="card-text"><?= $row['keterangan'] ?></p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPesanan<?= $row['id_menu'] ?>" style="margin-top: auto;">
                                Pesan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Pesanan -->
                <div class="modal fade" id="modalPesanan<?= $row['id_menu'] ?>" tabindex="-1" aria-labelledby="modalPesananLabel<?= $row['id_menu'] ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalPesananLabel<?= $row['id_menu'] ?>">Pesan Menu <?= $row['nama_menu'] ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="proses_pesanan.php" method="POST">
                                <div class="modal-body">
                                    <!-- Input Username -->
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" readonly>
                                    </div>
                                    <!-- Input Alamat -->
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input  type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap" value="<?php echo $user['alamat']; ?>" readonly>
                                    </div>
                                    <!-- Input Keterangan -->
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan tambahan"></textarea>
                                    </div>
                                    <!-- Input Jumlah Pesanan -->
                                    <div class="form-group">
                                        <label for="jumlahPesanan<?= $row['id_menu'] ?>">Jumlah Pesanan</label>
                                        <input type="number" class="form-control" id="jumlahPesanan<?= $row['id_menu'] ?>" name="jumlah_pesanan" required>
                                        <input type="hidden" name="id_menu" value="<?= $row['id_menu'] ?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Pesan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        <?php
            }
        } else {
            echo "Tidak ada menu yang tersedia.";
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
